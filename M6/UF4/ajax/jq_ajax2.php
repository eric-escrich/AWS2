<?php
//Obtenemos los datos de los input
$nombre = $_REQUEST["nombre"];
$apellido = $_REQUEST["apellido"];
$edad = $_REQUEST["edad"];

//Seteamos el header de "content-type" como "JSON" para que jQuery lo reconozca como tal
header('Content-Type: application/json');
//Guardamos los datos en un array
$datos = array(
    'estado' => 'ok',
    'nombre' => $nombre,
    'apellido' => $apellido,
    'edad' => $edad
);
//Devolvemos el array pasado a JSON como objeto
echo json_encode($datos, JSON_FORCE_OBJECT);
?>