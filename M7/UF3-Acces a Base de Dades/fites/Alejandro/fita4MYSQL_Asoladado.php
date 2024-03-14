<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nueva Oficina</title>
</head>
<body>
    <h1>Agregar Nueva Oficina</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $username = "super";
        $password = "1q2w·E4r5t6y";
        $dbname = "classicmodels";

        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Comprobar conexión
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Obtener datos del formulario
        $city = $_POST['city'];
        $phone = $_POST['phone'];
        $addressLine1 = $_POST['addressLine1'];
        $addressLine2 = $_POST['addressLine2'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $postalCode = $_POST['postalCode'];
        $territory = $_POST['territory'];

        // Generar el código de oficina automáticamente
        // Esto podría ser más sofisticado, pero aquí generaremos un código único basado en el timestamp actual
        $officeCode = time();

        // Preparar la consulta SQL
        $sql = "INSERT INTO offices (officeCode, city, phone, addressLine1, addressLine2, state, country, postalCode, territory)
                VALUES ('$officeCode', '$city', '$phone', '$addressLine1', '$addressLine2', '$state', '$country', '$postalCode', '$territory')";

        // Ejecutar la consulta y verificar si fue exitosa
        if ($conn->query($sql) === TRUE) {
            echo "Nueva oficina agregada correctamente.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        // Cerrar conexión
        $conn->close();
    }
    ?>

    <form action="fita4MYSQL_Asoladado.php" method="POST">
        <label for="city">Ciudad:</label>
        <input type="text" id="city" name="city" required><br>

        <label for="phone">Teléfono:</label>
        <input type="text" id="phone" name="phone" required><br>

        <label for="addressLine1">Dirección línea 1:</label>
        <input type="text" id="addressLine1" name="addressLine1" required><br>

        <label for="addressLine2">Dirección línea 2:</label>
        <input type="text" id="addressLine2" name="addressLine2"><br>

        <label for="state">Estado:</label>
        <input type="text" id="state" name="state"><br>

        <label for="country">País:</label>
        <input type="text" id="country" name="country" required><br>

        <label for="postalCode">Código Postal:</label>
        <input type="text" id="postalCode" name="postalCode" required><br>

        <label for="territory">Territorio:</label>
        <input type="text" id="territory" name="territory" required><br>

        <button type="submit">Agregar Oficina</button>
    </form>
</body>
</html>
