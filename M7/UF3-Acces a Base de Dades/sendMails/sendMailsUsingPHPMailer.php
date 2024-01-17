<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "vendor/autoload.php";
require "config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Enviar Mail</h1>
    <form method="post">
        <label for="destinatario">Destinatari:</label>
        <input type="email" id="destinatari" name="destinatari" required>
        <br>

        <label for="tittle">Títol:</label>
        <input type="text" id="tittle" name="tittle" required>
        <br>

        <label for="content">Contenido del Mensaje:</label>
        <textarea id="content" name="content" required></textarea>
        <br>

        <input type="submit" value="Enviar">
    </form>

    <?php


    if (isset($_POST["destinatari"]) && isset($_POST["tittle"]) && isset($_POST["content"])) {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Mailer = "smtp";
        $mail->IsSMTP();

        $mail->SMTPDebug = 1;
        $mail->SMTPAuth = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;
        $mail->Host = "smtp.gmail.com";
        $mail->Username = $emailUsername;
        $mail->Password = $emailPassword;

        $mail->IsHTML(true);
        $mail->AddAddress($_POST["destinatari"]);
        $mail->SetFrom($emailUsername);
        $mail->Subject = $_POST["tittle"];
        $content = $_POST["content"];

        $mail->MsgHTML($content);
        if (!$mail->Send()) {
            echo "Error while sending Email.";
            var_dump($mail);
        } else {
            echo "Email sent successfully";
        }
    }
    ?>
</body>

</html>