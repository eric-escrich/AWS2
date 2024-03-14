<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fita5_MYSQL_Asoldado</title>
</head>
<body>
    <h1>Buscar Empleados</h1>
    <form action="fita3MYSQL_Asoldado.php" method="GET">
        <label for="nombre">Buscar por nombre o apellido:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre o Apellido">
        <button type="submit">Buscar</button>
    </form>
    <br>
    <?php
    $servername = "localhost";
    $username = "super";
    $password = "1q2w·E4r5t6y";
    $dbname = "classicmodels";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $search_name = isset($_GET['nombre']) ? $_GET['nombre'] : '';

    $sql = "SELECT e.firstName, e.lastName, o.city AS officeCity
            FROM employees e
            JOIN offices o ON e.officeCode = o.officeCode";

    if (!empty($search_name)) {
        $sql .= " WHERE e.firstName LIKE '%$search_name%' OR e.lastName LIKE '%$search_name%'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>" . $row["firstName"] . " " . $row["lastName"] . " - " . $row["officeCity"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No se encontraron resultados.</p>";
    }
    $conn->close();
    ?>
</body>
</html>
