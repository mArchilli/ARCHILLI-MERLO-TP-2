<?php 

require_once '../../function/autoload.php';

$datosPOST = $_POST;

$id = $_GET['id'] ?? FALSE;

//  echo "<pre>";
//  print_r($datosPOST);
//  echo "</pre>";

//  echo "<pre>";
//  print_r($id);
//  echo "</pre>";

try {
    $genero = (new Genero())->get_x_id($id);

    
    $genero->edit( $datosPOST['nombre'] );

    (new Alerta())->add_alerta('success', "Genero <strong>{$datosPOST['nombre']}</strong> editado correctamente.");
    header('Location: ../index.php?sec=admin_genero');

} catch (Exception $e) {
    // echo "<pre>";
    // print_r($e);
    // echo "</pre>";
    (new Alerta())->add_alerta('error', 'Ocurrio un error al momento de editar el genero. Por favor intentelo nuevamente o pongase en contacto con el administrador del sistema.');
    header('Location: ../index.php?sec=admin_genero');

}

