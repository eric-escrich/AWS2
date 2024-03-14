<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fita4_MYSQL_Asoldado</title>
</head>
<body>
    <h1>Seleccionar Proveedor de Productos</h1>
    <label for="proveedor">Selecciona un proveedor:</label>
    <select id="proveedor" name="proveedor">
        <option value="todos">Todos los proveedores</option>
        <?php
        $servername = "localhost";
        $username = "super";
        $password = "1q2w·E4r5t6y";
        $dbname = "classicmodels";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT DISTINCT productVendor FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["productVendor"] . "'>" . $row["productVendor"] . "</option>";
            }
        } else {
            echo "0 resultados";
        }
        $conn->close();
        ?>
    </select>
</body>
</html>