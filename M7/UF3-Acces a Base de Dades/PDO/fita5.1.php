<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>fita5.1</title>
</head>
<body>
	<form method="post">
		<label>Introdueix un nom de pais:</label>
		<input type="text" name="pais" required></input>
		<input type="submit" value="cerca">
	</form>
	<?php
		try {
			$hostname = "localhost";
		    $dbname = "world";
		    $username = "enric";
		    $pw = "enric123";
		    $pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");
		  } catch (PDOException $e) {
		    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
		    exit;
		  }
		if (isset($_POST['pais'])) {
			$pais = $_POST['pais'];
			$query = $pdo -> prepare("select city.Name as 'CityName', country.Name as 'CountryName' from city inner join country on city.CountryCode = country.Code where country.Name like '%$pais%'");
			$query -> execute();
			$row = $query -> fetch();
			echo "<table border=1>";
			echo "<thead><tr><th>Country Name</th>";
			echo "<th>City Name</th></tr></thead>";
			while ( $row ) {
				echo "<tr>";
			    echo "<td>".$row['CountryName']."</td><td>".$row['CityName']. "</td>\n";
				$row = $query->fetch();
				echo "</tr>\n";
			}
			echo "</table>";
		}


	?>
</body>
</html>