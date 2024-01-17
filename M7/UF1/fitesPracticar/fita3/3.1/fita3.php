<!-- ex31.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercici 31</title>
</head>

<body>

    <h1>PROCESSA CONTACTES</h1>

    <?php
    // Ruta del archivo contactes31.txt
    $archivoOriginal = 'contactes31.txt';

    // Lee el contenido del archivo contactes31.txt
    $contenido = file_get_contents($archivoOriginal);

    // Divide el contenido en líneas
    $lineas = explode("\n", $contenido);

    // Muestra los contactos en una tabla
    echo '<table border="1">
        <tr>
            <th>Nom</th>
            <th>Cognom1</th>
            <th>Cognom2</th>
            <th>Telèfon</th>
        </tr>';

    foreach ($lineas as $linea) {
        // Divide cada línea en los datos individuales separados por comas
        $datos = explode(',', $linea);

        // Muestra cada contacto en una fila de la tabla
        echo '<tr>';
        foreach ($datos as $dato) {
            echo '<td>' . $dato . '</td>';
        }
        echo '</tr>';
    }

    echo '</table>';

    // Genera el archivo contactes31b.txt con los contactos separados por #
    $archivoNuevo = 'contactes31b.txt';
    file_put_contents($archivoNuevo, str_replace(',', '#', $contenido));

    echo '<p>Se ha generado el archivo contactes31b.txt con los contactos separados por #</p>';
    ?>

</body>

</html>