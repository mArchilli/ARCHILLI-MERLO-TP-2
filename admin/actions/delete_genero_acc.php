<?PHP
require_once '../../function/autoload.php';

$id = $_GET['id'] ?? FALSE;

// echo "<pre>";
// print_r($id);
// echo "</pre>";

try {
    $genero = (new Genero())->get_x_id($id);
    
    // echo "<pre>";
    // print_r($genero);
    // echo "</pre>";

    $genero->delete();
    (new Alerta())->add_alerta('danger', "Genero <strong>{$datosPOST['nombre']}</strong> eliminado correctamente.");
    header('Location: ../index.php?sec=admin_genero');

} catch (Exception $e) {
    // echo "<pre>";
    // print_r($e);
    // echo "</pre>";
    (new Alerta())->add_alerta('danger', 'Ocurrio un error al momento de eliminar el genero. Por favor intentelo nuevamente o pongase en contacto con el administrador del sistema.');
    header('Location: ../index.php?sec=admin_genero');

}
