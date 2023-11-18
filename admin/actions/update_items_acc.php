<?PHP
require_once '../../function/autoload.php';

$datosPOST = $_POST;

// echo "<pre>";
// print_r($datosPOST);
// echo "</pre>";

if(!empty($datosPOST)){
    (new Carrito())->update_quantities($datosPOST['q']);
    header('location: ../../index.php?sec=carrito');
}
