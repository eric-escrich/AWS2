<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Clientes</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>Buscar Clientes</h1>
    <form method="GET">
        <label for="nombre">Buscar por nombre o apellido:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre o Apellido">
        <button type="submit">Buscar</button>
    </form>
    <br>
    <?php
    $servername = "localhost";
    $username = "eric_escrich";
    $password = "1234";
    $dbname = "classicmodels";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die ("Connection failed: " . $conn->connect_error);
    }

    $search_name = isset ($_GET['nombre']) ? $_GET['nombre'] : '';

    $sql = "SELECT c.contactFirstName, c.contactLastName, o.orderNumber, o.orderDate, o.status
                FROM customers c
                JOIN orders o ON c.customerNumber = o.customerNumber";

    if (!empty ($search_name)) {
        $sql .= " WHERE c.contactFirstName LIKE '%$search_name%' OR c.contactLastName LIKE '%$search_name%'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Nombre</th><th>Apellido</th><th>Número de Orden</th><th>Fecha de Orden</th><th>Estado</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["contactFirstName"] . "</td>";
            echo "<td>" . $row["contactLastName"] . "</td>";
            echo "<td>" . $row["orderNumber"] . "</td>";
            echo "<td>" . $row["orderDate"] . "</td>";
            echo "<td>" . $row["status"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No se encontraron resultados.</p>";
    }
    $conn->close();
    ?>
</body>

</html>