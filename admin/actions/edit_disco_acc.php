<?php 

require_once '../../function/autoload.php';

$datosPOST = $_POST;
$archivosPOST = $_FILES['portada'];

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
    $disco = (new Disco())->catalogo_por_id($id);

    $disco->clear_subGeneros();

    if(isset($datosPOST['subgeneros'])){
        foreach ($datosPOST['subgeneros'] as $id_subgenero) {
            $disco->insert_subGeneros($id , $id_subgenero);
        }
    }

    if (!empty($archivosPOST['tmp_name'])) {
         //Se reemplaza la imagen
         $portada = (new Imagen())->subirImagen(__DIR__ . '/../../img/covers/', $archivosPOST );

         if (!empty($datosPOST['portada_og'])){
             //BORRAR IMAGEN EXISTENTE EN CASO DE REEMPLAZO
             (new Imagen())->eliminarImagen(__DIR__ . '/../../img/covers/'. $datosPOST['portada_og'] );
         }   
        
     }else{
         //No se reemplaza la imagen
         $portada = $datosPOST['portada_og'];
     }

    $fecha_carga = date("Y-m-d");
    
    $disco->edit(
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

    (new Alerta())->add_alerta('success', "Disco <strong>{$datosPOST['titulo']}</strong> editado correctamente.");
    header('Location: ../index.php?sec=admin_disco');

} catch (Exception $e) {
    // echo "<pre>";
    // print_r($e);
    // echo "</pre>";
    (new Alerta())->add_alerta('danger', 'Ocurrio un error al momento de editar el disco. Por favor intentelo nuevamente o pongase en contacto con el administrador del sistema.');
    header('Location: ../index.php?sec=admin_disco');

}

