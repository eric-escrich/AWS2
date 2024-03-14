<?php 
include("config.php");

try {
    // Conexión a la base de datos
    $hostname = "localhost";
    $dbname = "classicmodels";
    $username = $dbUser;
    $pw = $dbPass;
    $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", "$username", "$pw");
} catch (PDOException $e) {
    echo "Failed to get DB handle: ". $e->getMessage();
    exit;
}

// Consulta SQL para obtener los proveedores de productos
$sql_proveedores = "SELECT DISTINCT productVendor FROM products";
$stmt_proveedores = $pdo->prepare($sql_proveedores);
$stmt_proveedores->execute();
$proveedores = $stmt_proveedores->fetchAll(PDO::FETCH_COLUMN);

// Inicializar una variable para almacenar los productos seleccionados
$productos_seleccionados = [];

// Verificar si se ha seleccionado un proveedor
if (isset($_GET['proveedor'])) {
    // Obtener el proveedor seleccionado
    $proveedor_seleccionado = $_GET['proveedor'];

    // Consulta SQL para obtener los productos del proveedor seleccionado
    $sql_productos = "SELECT productName FROM products WHERE productVendor = :proveedor";
    $stmt_productos = $pdo->prepare($sql_productos);
    $stmt_productos->bindParam(':proveedor', $proveedor_seleccionado, PDO::PARAM_STR);
    $stmt_productos->execute();
    $productos_seleccionados = $stmt_productos->fetchAll(PDO::FETCH_COLUMN);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fita4</title>
</head>
<body>
    <form action="#" method="get">
        <label for="proveedor">Selecciona un proveedor:</label>
        <select name="proveedor" id="proveedor">
            <option value="" disabled selected>Seleccione un proveedor</option>
            <?php foreach ($proveedores as $proveedor) : ?>
                <option value="<?php echo $proveedor; ?>"><?php echo $proveedor; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Mostrar productos">
    </form>

    <?php if (!empty($productos_seleccionados)) : ?>
        <h2>Productos del proveedor <?php echo $proveedor_seleccionado; ?>:</h2>
        <ul>
            <?php foreach ($productos_seleccionados as $producto) : ?>
                <li><?php echo $producto; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>
