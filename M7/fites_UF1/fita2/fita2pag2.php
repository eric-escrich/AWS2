<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Pàgina 2</title>
</head>

<body>
    <?php
    if (isset($_POST["text"])) {
        $text = $_POST["text"];

        $lineas = explode("\n", $text);
        ?>
        <form action="fita2pag3.php" method="post">
            <select name="opcion" id="opciones" required>
                <?php
                foreach ($lineas as $linea) {
                    echo "<option value=\"$linea\">$linea</option>";
                }
                ?>
            </select>
            <br>
            <input type="submit" value="Tramet la consulta">
        </form>
        <?php
    }
    ?>
</body>

</html>