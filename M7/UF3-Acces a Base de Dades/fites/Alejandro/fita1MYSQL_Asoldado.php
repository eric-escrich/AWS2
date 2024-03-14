<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fita3_MYSQL_Asoldado</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <label for="search">Buscar productos:</label>
        <input type="text" id="search" name="search">
        <input type="submit" value="Buscar">
    </form>
</body>
</html>
<?php
$servername = "localhost";
$username = "super";
$password = "1q2w·E4r5t6y";
$dbname = "classicmodels";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $search = $_POST["search"];

  $sql = "SELECT productName, productLine, quantityInStock FROM products WHERE productName LIKE '%$search%'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Nombre del producto</th><th>Línea de producto</th><th>Cantidad en stock</th></tr>";
    while ($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row["productName"] . "</td><td>" . $row["productLine"] . "</td><td>" . $row["quantityInStock"] . "</td></tr>";
    }
    echo "</table>";
  } else {
    echo "No se encontraron resultados.";
  }
}

$conn->close();
?>