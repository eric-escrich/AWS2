<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Exercici 3</title>
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
      $X = 20;


      for ($i = 0; $i <= $X; $i++) {
         echo "<tr>\n";
         for ($j = 0; $j <= $X; $j++) {
            if ($j == 0 && $i == 0) {
               echo "\t<td>" . chr(32) . "</td>\n";
            } else if ($j == 0 && $i != 0) {
               echo "\t<td>" . chr(64 + $i) . "</td>\n";
            } else if ($i == 0) {
               echo "\t<td>" . $j . "</td>\n";
            } else {
               echo "\t<td>" . chr(32) . "</td>\n";
            }

         }
         echo "\t</tr>\n";
      }

      ?>
   </table>
</body>

</html>