<?php 

require_once '../../function/autoload.php';

$datosPOST = $_POST;
$archivosPOST = $_FILES['imagen'];

$id = $_GET['id'] ?? FALSE;

// echo "<pre>";
// print_r($datosPOST);
// echo "</pre>";

// echo "<pre>";
// print_r($archivosPOST);
// echo "</pre>";

// echo "<pre>";
// print_r($id);
// echo "</pre>";

try {
    $artista = (new Artista())->get_x_id($id);

    echo "<pre>";
    print_r($artista);
    echo "</pre>";

    // $artista->edit(
    //     $datosPOST["nombre"],
    //     $datosPOST["nacionalidad"],
    //     $datosPOST["biografia"],
    //     $imagen
    // )

   } catch (Exception $e) {

}

