<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Exercici 1</title>
   <style>
      table,
      th,
      td {
         padding: 10px;
         border: 1px solid black;
         border-collapse: collapse;
      }
   </style>
</head>

<body>
   <h2>Exercici 1</h2>
   <table>
      <?php
      $N = 7;
      echo "<tr>\n";
      for ($i = 1; $i <= $N; $i++) {
         echo "\t<td>" . $i . "</td>\n";
      }
      echo "\t</tr>\n";
      ?>
   </table>
   <?php
   echo "<br>Hola, omple amb el teu nom: ";
   echo "<br>\n";
   echo '<input type="text"name="nom">';
   ?>
</body>

</html>