<?PHP
require_once '../../function/autoload.php';

$id = $_GET['id'] ?? FALSE;
$q = $_GET['q'] ?? 1;

$disco = (new Disco())->catalogo_por_id($id);

if ($id) {
    (new Carrito())->add_item($id, $q);
    (new Alerta())->add_alerta('success', "<strong>{$disco->getTitulo()}</strong> agregado correctamente al carrito.");
    header('location: ../../index.php?sec=producto&id=' . $id);
}