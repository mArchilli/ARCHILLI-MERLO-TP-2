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

    (new Alerta())->add_alerta('danger', "Artista <strong>{$datosPOST['nombre']}</strong> eliminado correctamente.");
    header('Location: ../index.php?sec=admin_artista');

} catch (Exception $e) {
    // echo "<pre>";
    // print_r($e);
    // echo "</pre>";
    (new Alerta())->add_alerta('danger', 'Ocurrio un error al momento de eliminar el artista. Por favor intentelo nuevamente o pongase en contacto con el administrador del sistema.');
    header('Location: ../index.php?sec=admin_artista');

}
