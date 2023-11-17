<?php
require_once '../../function/autoload.php';

$datosPOST = $_POST;

echo "<pre>";
print_r($datosPOST);
echo "</pre>";

try {
    (new Genero())->insert(
        $datosPOST['nombre'],
    );

    (new Alerta())->add_alerta('success', "Genero <strong>{$datosPOST['nombre']}</strong> agregado correctamente.");
    header('Location: ../index.php?sec=admin_genero');
} catch (Exception $e) {
    // echo "<pre>";
    // print_r($e);
    // echo "</pre>";
    (new Alerta())->add_alerta('danger', 'Ocurrio un error al momento de agregar el genero. Por favor intentelo nuevamente o pongase en contacto con el administrador del sistema.');
    header('Location: ../index.php?sec=admin_genero');
}