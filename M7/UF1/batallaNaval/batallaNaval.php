<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Batalla Naval 1</title>
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
   <h1>Batalla Naval</h1>
   <h3><br>Exercici 1</h3>

   <table>
      <?php
      $X = 10;
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


   <h3><br>Exercici 2</h3>

   <table>
      <?php
      // la cuadricula es de 10 * 10
      $X = 10;
      // array de numeros
      $numero = rand(1, 10); //[1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
      $letra = rand(1, 1); // [65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75];
      $numero2;
      $letra2;
      $orientacion;
      $direccion;
      $submari = [];

      $todoOK = true;
      while ($todoOK) {
         $numero = rand(1, 10);
         $letra = rand(1, 10);

         //si $orientacion es 1 el barco se situará en el eje de las Y
         //si $orientacion es 2 el barco se situará en el eje de las X
         $orientacion = rand(1, 2);

         if ($orientacion == 1) {
            //si $direccion es 1 el barco se situará hacia arriba
            //si $direccion es 2 el barco se situará hacia abajo
            $direccion = rand(1, 2);
            if (!($direccion == 1 && $letra == 1)) {
               $letra2 = $letra - 1;
               $numero2 = $numero;
               $todoOK = false;
            } else if (!($direccion == 2 && $letra == 10)) {
               $letra2 = $letra + 1;
               $numero2 = $numero;
               $todoOK = false;
            }
         } else if ($orientacion == 2) {
            //si $direccion es 1 el barco se situará hacia la izquierda
            //si $direccion es 2 el barco se situará hacia la derecha
            $direccion = rand(1, 2);
            if (!($direccion == 1 && $numero == 1)) {
               $numero2 = $numero - 1;
               $letra2 = $letra;
               $todoOK = false;
            } else if (!($direccion == 2 && $letra == 10)) {
               $numero2 = $numero + 1;
               $letra2 = $letra;
               $todoOK = false;
            }
         } else {
            echo "error";
         }
      }

      array_push($submari, [$numero, $letra], [$numero2, $letra2]);
      print_r($submari);
      echo "direccion => " . $direccion;
      echo "orientacion => " . $orientacion;

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
               foreach ($submari as $pos) {
                  if ($pos[0] == $j && $pos[1] == $i) {
                     echo "\t<td>X</td>\n";
                  }
               }
               // echo "\t<td>i= " . $i . "<br>j= " . $j . "</td>\n";
               echo "\t<td>" . chr(32) . "</td>\n";
            }

         }
         echo "\t</tr>\n";
      }

      ?>
   </table>
</body>

</html>