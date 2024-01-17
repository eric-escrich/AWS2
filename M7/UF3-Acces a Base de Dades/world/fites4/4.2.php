<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FITA 4.2</title>
</head>

<body>
    <h1>FITA 4.2</h1>

    <?php
    $conn = mysqli_connect('localhost', 'super', 'root');

    if (!$conn) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    mysqli_select_db($conn, 'world');

    $consulta = "SELECT DISTINCT Continent FROM country;";

    $resultat = mysqli_query($conn, $consulta);

    if (!$resultat) {
        $message = 'Consulta invàlida: ' . mysqli_error($conn) . "\n";
        $message .= 'Consulta realitzada: ' . $consulta;
        die($message);
    }
    ?>

    <form action="4.2.php" method="post">
        <label>Selecciona mínim un continent:</label><br>
        <?php
        while ($registre = mysqli_fetch_assoc($resultat)) {
            $continent = $registre['Continent'];
            echo "
            <label>
            <input type='checkbox' name='continents[]' value='$continent'> $continent
            </label><br>";
        }
        ?>
        <br><input type="submit" value="CERCAR"><br><br>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['continents'])) {
            $continentesSeleccionados = $_POST['continents'];

            $whereClause = "WHERE continent IN ('" . implode("','", $continentesSeleccionados) . "')";

            $consultaCiudades = "SELECT Name, Continent FROM country $whereClause";

            $resultatCiudades = mysqli_query($conn, $consultaCiudades);

            if (!$resultatCiudades) {
                $message = 'Consulta invàlida: ' . mysqli_error($conn) . "\n";
                $message .= 'Consulta realitzada: ' . $consultaCiudades;
                die($message);
            }
            ?>

            <table>
                <thead>
                    <td colspan='2' align='center' bgcolor='cyan'>Llistat de ciutats</td>
                </thead>
                <?php
                while ($registreCiudades = mysqli_fetch_assoc($resultatCiudades)) {
                    echo "\t<tr>\n";
                    echo "\t\t<td>" . $registreCiudades['Name'] . "</td>\n";
                    echo "\t\t<td>" . $registreCiudades['Continent'] . "</td>\n";
                    echo "\t</tr>\n";
                }
                ?>
            </table>
            <?php
        } else {
            echo "Por favor, selecciona al menos un continente.";
        }
    }

    mysqli_close($conn);
    ?>

</body>

</html>