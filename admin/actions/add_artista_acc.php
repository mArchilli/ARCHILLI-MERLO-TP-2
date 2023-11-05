<?php 

require_once '../../function/autoload.php';

$datosPOST = $_POST;
$archivosPOST = $_FILES['imagen'];

echo "<pre>";
print_r($datosPOST);
echo "</pre>";

echo "<pre>";
print_r($archivosPOST);
echo "</pre>";

try {
    $imagen = "prueba.jpg";
    (new Artista())->insert(
        $datosPOST['nombre'],
        $datosPOST['nacionalidad'],
        $datosPOST['biografia'],
        $imagen,
    );
} catch (Exception $e) {
    echo "<pre>";
    print_r($e);
    echo "</pre>";
    die("No se pudo agregar el artista");
}