<?PHP
require_once '../../function/autoload.php';

$id = $_GET['id'] ?? FALSE;

// echo "<pre>";
// print_r($id);
// echo "</pre>";

try {
    $disco = (new Disco())->catalogo_por_id($id);
    
    // echo "<pre>";
    // print_r($disco);
    // echo "</pre>";

    $disco->clear_subGeneros();
    if (!empty($disco->getPortada())) {
        (new Imagen())->eliminarImagen(__DIR__ . '/../../img/covers/'. $disco->getPortada());
    }
    $disco->delete();
    (new Alerta())->add_alerta('success', "Disco <strong>{$datosPOST['titulo']}</strong> eliminado correctamente.");
    header('Location: ../index.php?sec=admin_disco');

} catch (Exception $e) {
    // echo "<pre>";
    // print_r($e);
    // echo "</pre>";
    (new Alerta())->add_alerta('error', 'Ocurrio un error al momento de eliminar el disco. Por favor intentelo nuevamente o pongase en contacto con el administrador del sistema.');
    header('Location: ../index.php?sec=admin_disco');

}
