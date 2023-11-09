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

    header('Location: ../index.php?sec=admin_genero');

} catch (Exception $e) {
    echo "<pre>";
    print_r($e);
    echo "</pre>";
    die("No se pudo editar correctamente el genero");

}

