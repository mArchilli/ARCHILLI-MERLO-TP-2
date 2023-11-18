<?PHP
require_once '../../function/autoload.php';

$id = $_GET['id'] ?? FALSE;

if ($id) {
    (new Carrito())->remove_item($id);
    header('location: ../../index.php?sec=carrito');
}