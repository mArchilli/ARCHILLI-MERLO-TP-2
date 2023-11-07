<?php 

require_once '../../function/autoload.php';

$datosPOST = $_POST;
$archivosPOST = $_FILES['imagen'];

// echo "<pre>";
// print_r($datossPOST);
// echo "</pre>";

// echo "<pre>";
// print_r($archivosPOST);
// echo "</pre>";


try {
    $imagen = (new Imagen())->subirImagen(__DIR__ . '/../../img/artistas/', $archivosPOST );
    (new Artista())->insert(
        $datosPOST['nombre'],
        $datosPOST['nacionalidad'],
        $datosPOST['biografia'],
        $imagen,
    );

    header('Location: ../index.php?sec=admin_artista');
} catch (Exception $e) {
    echo "<pre>";
    print_r($e);
    echo "</pre>";
    die("No se pudo agregar el artista");
}