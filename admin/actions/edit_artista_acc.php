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

    if (!empty($archivosPOST['tmp_name'])) {
        //Se reemplaza la imagen
        $imagen = (new Imagen())->subirImagen(__DIR__ . '/../../img/artistas/', $archivosPOST );
        
    }else{
        //No se reemplaza la imagen
        $imagen = $datosPOST['imagen_og'];
    }

        

    $artista->edit(
        $datosPOST['nombre'],
        $datosPOST['nacionalidad'],
        $datosPOST['biografia'],
        $imagen
    );

    header('Location: ../index.php?sec=admin_artista');

} catch (Exception $e) {
    echo "<pre>";
    print_r($e);
    echo "</pre>";
    die("No se pudo editar correctamente el artista");

}

