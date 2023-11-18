<?php 

require_once '../../function/autoload.php';

$datosPOST = $_POST;

// echo "<pre>";
// print_r($datosPOST);
// echo "</pre>";

$login = (new Autenticacion())->log_in($datosPOST['username'], $datosPOST['password']);

// echo "<pre>";
// print_r($login);
// echo "</pre>";

if($login){
    if($login == "usuario"){
        header('location: ../../index.php?sec=panel_usuario');
    } else {
        header('location: ../index.php?sec=dashboard');
    }
} else {
    header('location: ../index.php?sec=login');
}




