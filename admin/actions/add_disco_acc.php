<?php 

require_once '../../function/autoload.php';

$datosPOST = $_POST;
$archivosPOST = $_FILES['portada'];

echo "<pre>";
print_r($datosPOST);
echo "</pre>";

// echo "<pre>";
// print_r($archivosPOST);
// echo "</pre>";


try {
    $disco = new Disco();

    $portada = (new Imagen)->subirImagen(__DIR__ .  '/../../img/covers', $archivosPOST);

    $fecha_carga = date("Y-m-d");
    
    $idDisco = $disco->insert(
        $datosPOST['titulo'],
        $datosPOST['artista'],
        $datosPOST['genero'],
        $datosPOST['descripcion'],
        $datosPOST['sello'],
        $portada,
        $datosPOST['publicacion'],
        $datosPOST['precio'],
        $fecha_carga
    );

    if(isset($datosPOST['subgeneros'])){
        foreach ($datosPOST['subgeneros'] as $id_subgenero) {
            $disco->insert_subGeneros($idDisco, $id_subgenero);
        }
    }

    (new Alerta())->add_alerta('success', "Disco <strong>{$datosPOST['titulo']}</strong> agregado correctamente.");
    header('Location: ../index.php?sec=admin_disco');

} catch (Exception $e) {
    // echo "<pre>";
    // print_r($e);
    // echo "</pre>";
    (new Alerta())->add_alerta('error', 'Ocurrio un error al momento de agregar el disco. Por favor intentelo nuevamente o ponga en contacto con el administrador del sistema.');
    header('Location: ../index.php?sec=admin_disco');
}