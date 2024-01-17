<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Exercici 2</title>
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
   <table>
      <?php
      $N = 12;

      echo "<tr>\n";
      for ($i = 65; $i < 65 + $N; $i++) {

         echo "\t<td>" . chr($i) . "</td>\n";
      }
      echo "\t</tr>\n";


      echo "<tr>\n";
      for ($i = 1; $i <= $N; $i++) {
         echo "\t<td>" . $i . "</td>\n";
      }
      echo "\t</tr>\n";
      ?>
   </table>
</body>

</html>