<?php 

require_once '../../function/autoload.php';

$datosPOST = $_POST;
$archivosPOST = $_FILES['imagen'];

echo "<pre>";
print_r($archivosPOST);
echo "</pre>";

if (!empty($archivosPOST['tmp_name'])) {
    $archivo_original = explode('.', $archivosPOST['name']);
    $extension = end($archivo_original);

    $nombreArchivo = time() . ".$extension";

    $fileUpload = move_uploaded_file($archivosPOST['tmp_name'], "../../img/artistas/$nombreArchivo");

    if ($fileUpload) {
        $imagen = $nombreArchivo;
    } else {
        die("No se pudo subir la imagen");
    }
} else {
    $imagen = "error.jpg";
}

try {
    
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