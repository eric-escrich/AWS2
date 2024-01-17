$X = 10; // Tamaño del tablero (10x10 en este caso)
$submari = [];

// Función para generar una coordenada aleatoria válida para el barco
function generarCoordenada() {
global $X;
$numero = rand(1, $X);
$letra = chr(rand(65, 74));
return [$numero, $letra];
}

// Función para verificar si una coordenada es válida según las restricciones
function esCoordenadaValida($coordenada, $submari) {
foreach ($submari as $barco) {
if (in_array($coordenada, $barco)) {
return false;
}
}
return true;
}

// Función para agregar un barco al tablero
function agregarBarco(&$submari, $longitud) {
$coordenadas = [];
do {
$coordenada = generarCoordenada();
} while (!esCoordenadaValida($coordenada, $submari));

$coordenadas[] = $coordenada;
$orientacion = rand(1, 2);

for ($i = 1; $i < $longitud; $i++) { if ($orientacion==1) { $coordenada[0]++; } else { $coordenada[1]++; } if
   (!esCoordenadaValida($coordenada, $submari)) { return false; // Si no se pueden colocar todas las partes del barco,
   regresa false } $coordenadas[]=$coordenada; } $submari[]=$coordenadas; return true; } // Agregar barcos al tablero
   while (count($submari) < 5) { // Colocar 5 barcos en el tablero (puedes ajustar el número según tus necesidades) if
   (!agregarBarco($submari, 2)) { // Agregar un barco de longitud 2 (ajusta según las longitudes deseadas) // Si no se
   puede colocar un barco, intenta de nuevo $submari=[]; } } // Imprimir el contenido de $submari echo '<pre>' ;
   print_r($submari); echo '</pre>' ;