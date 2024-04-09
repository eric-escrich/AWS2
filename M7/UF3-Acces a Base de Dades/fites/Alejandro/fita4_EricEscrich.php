<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fita4</title>
</head>

<body>
    <h1>Seleccionar oficina</h1>
    <label for="proveedor">Selecciona una oficina:</label>
    <select id="proveedor" name="proveedor">
        <option value="todos">Office</option>
        <?php
        $servername = "localhost";
        $username = "eric_escrich";
        $password = "1234";
        $dbname = "classicmodels";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "select city from offices;";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["city"] . "'>" . $row["city"] . "</option>";
            }
        } else {
            echo "0 resultados";
        }
        $conn->close();
        ?>
    </select>
</body>

</html>