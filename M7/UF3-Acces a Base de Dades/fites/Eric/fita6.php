<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producte</title>
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "eric_escrich";
    $password = "1234";
    $dbname = "classicmodels";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die ("Connection failed: " . $conn->connect_error);
    }
    ?>
    <h1>Crear Producte</h1>
    <form method="post">
        Nom del producte: <input type="text" name="productName"><br>
        Línia de producte:
        <select name="productLine">
            <?php
            $query = "SELECT productLine FROM productlines";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['productLine'] . "'>" . $row['productLine'] . "</option>";
                }
            }
            ?>
        </select><br>
        Escala del producte: <input type="text" name="productScale"><br>
        Proveïdor del producte: <input type="text" name="productVendor"><br>
        Descripció del producte: <textarea name="productDescription"></textarea><br>
        Quantitat en estoc: <input type="number" name="quantityInStock"><br>
        Preu de compra: <input type="number" step="0.01" name="buyPrice"><br>
        PVP: <input type="number" step="0.01" name="MSRP"><br>
        <input type="submit">
    </form>
    <br>
    <?php
    function generateProductCode()
    {
        return 'PROD_' . substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $productName = $_POST['productName'];
        $productLine = $_POST['productLine'];
        $productScale = $_POST['productScale'];
        $productVendor = $_POST['productVendor'];
        $productDescription = $_POST['productDescription'];
        $quantityInStock = $_POST['quantityInStock'];
        $buyPrice = $_POST['buyPrice'];
        $MSRP = $_POST['MSRP'];

        $productCode = generateProductCode();

        $sql = "INSERT INTO products (productCode, productName, productLine, productScale, productVendor, productDescription, quantityInStock, buyPrice, MSRP) 
        VALUES ('$productCode', '$productName', '$productLine', '$productScale', '$productVendor', '$productDescription', '$quantityInStock', '$buyPrice', '$MSRP')";

        if ($conn->query($sql) === TRUE) {
            echo "Producte afegit correctament.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
    ?>
</body>

</html>