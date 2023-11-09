<?PHP
require_once '../../function/autoload.php';

$id = $_GET['id'] ?? FALSE;

// echo "<pre>";
// print_r($id);
// echo "</pre>";

try {
    $artista = (new Artista())->get_x_id($id);
    
    // echo "<pre>";
    // print_r($artista);
    // echo "</pre>";

    $artista->delete();
    if (!empty($artista->getImagen())) {
        (new Imagen())->eliminarImagen(__DIR__ . '/../../img/artistas/'. $artista->getImagen());
    }

    header('Location: ../index.php?sec=admin_artista');

} catch (Exception $e) {
    echo "<pre>";
    print_r($e);
    echo "</pre>";
    die("No se pudo eliminar el artista");

}
