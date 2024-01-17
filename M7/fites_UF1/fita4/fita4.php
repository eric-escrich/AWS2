<?php
session_start();

$sameWords = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $formText = $_POST["text"];

    $sesionText = isset($_SESSION['text']) ? $_SESSION['text'] : '';

    $sesionWords = explode(' ', $sesionText);

    $formWords = explode(' ', $formText);

    $sameWords = array_intersect($sesionWords, $formWords);

    $_SESSION['text'] = $formText;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fita 4</title>
</head>

<body>
    <h1>Fita 4</h1>

    <form method="post">
        <textarea name="text" id="text"></textarea>
        <br>
        <input type="submit" value="Enviar">
    </form>

    <?php
    if (!empty($sameWords)) {
        echo " <ul>";
        foreach ($sameWords as $palabra) {
            echo "<li>Paraula coincident: $palabra </li>";
        }
        echo "</ul>";
    }
    ?>
</body>

</html>