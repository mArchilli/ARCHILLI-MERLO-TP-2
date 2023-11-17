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
    (new Alerta())->add_alerta('success', "Artista <strong>{$datosPOST['nombre']}</strong> agregado correctamente.");

    header('Location: ../index.php?sec=admin_artista');
} catch (Exception $e) {
    echo "<pre>";
    print_r($e);
    echo "</pre>";
    (new Alerta())->add_alerta('error', 'Ocurrio un error al momento de agregar el artista. Por favor intentelo nuevamente o pongase en contacto con el administrador del sistema.');
    header('Location: ../index.php?sec=admin_artista');
}