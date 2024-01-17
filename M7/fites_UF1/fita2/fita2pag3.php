<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Pàgina 3</title>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $opcion = $_POST["opcion"];

        // Mostrar la opción seleccionada
        echo "<p>Opció seleccionada: $opcion</p>";
    }
    ?>
</body>

</html>