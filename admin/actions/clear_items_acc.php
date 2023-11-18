<?PHP
require_once '../../function/autoload.php';

(new Carrito())->clear_items();
header('location: ../../index.php?sec=carrito');