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

    header('Location: ../index.php?sec=admin_genero');
} catch (Exception $e) {
    echo "<pre>";
    print_r($e);
    echo "</pre>";
    die("No se pudo agregar el genero");
}