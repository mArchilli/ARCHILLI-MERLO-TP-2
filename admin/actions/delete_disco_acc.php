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

    header('Location: ../index.php?sec=admin_disco');

} catch (Exception $e) {
    echo "<pre>";
    print_r($e);
    echo "</pre>";
    die("No se pudo eliminar el disco");

}
