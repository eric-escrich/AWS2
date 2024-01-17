<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fita 3</title>
</head>

<body>
    <h1>Fita3</h1>
    <br>
    <form method="post">
        <textarea name="text" id="text"></textarea>
        <br>
        <input type="submit" value="Enviar">
    </form>

    <?php
    $file = 'text.txt';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $textForm = $_POST["text"];

        if (!file_exists($file)) {
            touch($file);
        }

        $contentFile = file_get_contents($file);

        $wordsFile = explode(' ', $contentFile);

        $wordsForm = explode(' ', $textForm);

        $repeatWords = array_intersect($wordsFile, $wordsForm);

        if (!empty($repeatWords)) {
            echo '<ul>';
            foreach ($repeatWords as $word) {
                echo '<li>Paraula coincident: ' . $word . '</li>';
            }
            echo '</ul>';
        } else {
            echo "";
        }
        file_put_contents($file, $textForm);
    }
    unset($repeatWords);

    ?>

</body>

</html>