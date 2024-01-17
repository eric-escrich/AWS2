<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FITA 3.1</title>
</head>

<body>
    <h1>FITA 3.1</h1>

    <form action="3.1.php" method="post">
        <input type="number" name="min" placeholder="Introdueix el MÍNIM nombre d'habitants" required>
        <input type="number" name="max" placeholder="Introdueix el MÀXIM nombre d'habitants" required>
        <br><input type="submit" value="CERCAR">
    </form>

    <?php
    if (isset($_POST["min"]) && isset($_POST["max"])) {

        $max = $_POST["max"];
        $min = $_POST["min"];

        if ($max && $min) {
            # (1.1) Connectem a MySQL (host,usuari,contrassenya)
            $conn = mysqli_connect('localhost', 'super', 'root');

            # (1.2) Triem la base de dades amb la que treballarem
            mysqli_select_db($conn, 'world');

            # (2.1) creem el string de la consulta (query)
            $consulta = "select * from city where population > $min and population < $max;";

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
                    <?php echo "<td colspan='5' align='center' bgcolor='cyan'>Llistat de ciutats amb nombre d'abitants entre $min i $max" ?>
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
                    echo "\t\t<td>" . $registre["ID"] . "</td>\n";
                    echo "\t\t<td>" . $registre['Name'] . "</td>\n";
                    echo "\t\t<td>" . $registre['CountryCode'] . "</td>\n";
                    echo "\t\t<td>" . $registre["District"] . "</td>\n";
                    echo "\t\t<td>" . $registre['Population'] . "</td>\n";

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