<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FITA 4.1</title>
</head>

<body>
    <h1>FITA 4.1</h1>

    <?php
    $conn = mysqli_connect('localhost', 'super', 'root');

    mysqli_select_db($conn, 'world');

    $consulta = "select distinct Continent from country;";

    $resultat = mysqli_query($conn, $consulta);

    if (!$resultat) {
        $message = 'Consulta invàlida: ' . mysqli_error($conn) . "\n";
        $message .= 'Consulta realitzada: ' . $consulta;
        die($message);
    }
    ?>

    <form action="4.1.php" method="post">
        <label>Selecciona un continent</label><br>
        <select id="continents" name="continents">
            <?php
            # (3.2) Bucle while
            $i = 1;
            while ($registre = mysqli_fetch_assoc($resultat)) {
                $continent = $registre['Continent'];
                echo "<option value='$continent'>$continent</option>";
            }
            ?>
        </select>
        <br><input type="submit" value="CERCAR">
    </form>

    <?php
    if (isset($_POST["continents"])) {

        $continent = $_POST["continents"];

        if ($continent) {
            $consulta = "select Name from country where continent='$continent';";

            # (2.2) enviem la query al SGBD per obtenir el resultat
            $resultat = mysqli_query($conn, $consulta);

            # (2.3) si no hi ha resultat (0 files o bé hi ha algun error a la sintaxi)
            #     posem un missatge d'error i acabem (die) l'execució de la pàgina web
            if (!$resultat) {
                $message = 'Consulta invàlida: ' . mysqli_error($conn) . "\n";
                $message .= 'Consulta realitzada: ' . $consulta;
                die($message);
            }
            ?>

            <!-- (3.1) aquí va la taula HTML que omplirem amb dades de la BBDD -->
            <table>
                <!-- la capçalera de la taula l'hem de fer nosaltres -->
                <thead>
                    <?php echo "<td colspan='5' align='center' bgcolor='cyan'>Llistat de ciutats que estan al continent '$continent'" ?>
                    </td>
                </thead>
                <?php
                # (3.2) Bucle while
                while ($registre = mysqli_fetch_assoc($resultat)) {
                    # els \t (tabulador) i els \n (salt de línia) son perquè el codi font quedi llegible
        
                    # (3.3) obrim fila de la taula HTML amb <tr>
                    echo "\t<tr>\n";

                    # (3.4) cadascuna de les columnes ha d'anar precedida d'un <td>
                    #	després concatenar el contingut del camp del registre
                    #	i tancar amb un </td>
                    echo "\t\t<td>" . $registre['Name'] . "</td>\n";

                    # (3.5) tanquem la fila
                    echo "\t</tr>\n";
                }
                ?>
                <!-- (3.6) tanquem la taula -->
            </table>
            <?php
        }
    }
    ?>

</body>

</html>