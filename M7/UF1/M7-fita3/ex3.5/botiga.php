<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Botiga</title>
</head>

<body>
   <form method="post" action="">
      <?php
      $productes = fopen("productes.txt", "r");
      if ($productes) {
         // Lee el contenido del archivo línea por línea
         while (($linea = fgets($productes)) !== false) {
            echo "<input type='checkbox' name='prods[]' value='" . trim($linea) . "'>$linea</input><br>";
            // echo "<p>" . $linea . "</p>"; // Imprime la línea
         }
         echo "<br><input type='text' placeholder='Usuario' name='usuario' required>";
         echo "<br><input type='submit' value='Enviar'>";
         // Cierra el archivo
         fclose($productes);

         if (isset($_POST["prods"])) {
            $user = $_POST['usuario'];
            $comandes = fopen("comandes.txt", "a");
            $comanda = $user;
            foreach ($_POST["prods"] as $producte) {
               $comanda .= ", " . $producte;
            }
            fwrite($comandes, $comanda . "\n");
         }
      } else {
         echo "No se pudo abrir el archivo.";
      }
      ?>
   </form>


</body>

</html>