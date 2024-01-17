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
      $Y = 6;
      $X = 8;


      for ($i = 1; $i <= $Y; $i++) {
         echo "<tr>\n";
         $j = $i;
         for ($j; $j <= $X + $i - 1; $j++) {
            echo "\t<td>" . $j . "</td>\n";
         }
         echo "\t</tr>\n";
         $j++;
      }

      ?>
   </table>
</body>

</html>