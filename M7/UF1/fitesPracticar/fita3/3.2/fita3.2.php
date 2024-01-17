<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercici 32</title>
</head>

<body>

    <h1>INTRODUEIX DADES</h1>

    <form method="post">
        <textarea name="comentari" id="comentari"></textarea>
        <br>
        <label for="separador">Separador:</label>
        <input type="text" name="separador" id="separador">
        <br>
        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $comentario = $_POST["comentari"];
        $separador = $_POST["separador"];

        $archivoComentarios = 'comentaris.txt';
        if (!file_exists($archivoComentarios)) {
            touch($archivoComentarios);
        }

        $comentarioFormateado = str_replace(' ', $separador, $comentario) . PHP_EOL;
        file_put_contents($archivoComentarios, $comentarioFormateado, FILE_APPEND);
    }
    ?>

</body>

</html>