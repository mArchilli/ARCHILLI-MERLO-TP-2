<?php 

require_once '../../function/autoload.php';

$datosPOST = $_POST;
$archivosPOST = $_FILES['portada'];

// echo "<pre>";
// print_r($datossPOST);
// echo "</pre>";

// echo "<pre>";
// print_r($archivosPOST);
// echo "</pre>";


try {
    
} catch (Exception $e) {
    echo "<pre>";
    print_r($e);
    echo "</pre>";
    die("No se pudo agregar el artista");
}