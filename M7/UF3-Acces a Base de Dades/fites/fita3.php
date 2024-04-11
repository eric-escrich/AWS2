<?php
try {
    require '../dbAccess.php';
    $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $pw);
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fita 3</title>
        <meta name="description" content="Verifica tu dirección de email para acceder a 'Vota!'">
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>

    <body>
        <main>
            <h1>Fita 3</h1>
            <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["nombreProducto"])) {
                    $nombreProducto = $_POST["nombreProducto"];

                    $query = $pdo->prepare("select productName, productVendor, quantityInStock from products WHERE productName LIKE :nombreProducto;");
                    $query->execute([':nombreProducto' => "%$nombreProducto%"]);

                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>
                        <ul>
                            <li>Nombre del producto:
                                <?php echo $row['productName'] ?>
                            </li>
                            <li>Nombre del proveedor:
                                <?php echo $row['productVendor'] ?>
                            </li>
                            <li>Cantidad en stock:
                                <?php echo $row['quantityInStock'] ?>
                            </li>
                        </ul>
                    <?php }
                }
            } else { ?>
                <form method="post">
                    <label for="nombreProducto">Nom del producte:</label>
                    <input type="text" id="nombreProducto" name="nombreProducto">
                    <input type="submit" value="Buscar">
                </form>
            <?php } ?>
        </main>
    </body>

    </html>
    <?php
} catch (PDOException $e) {
    echo "\nERROR al conectarse con la base de datos -> " . $e->getMessage() . "\n";
}
?>