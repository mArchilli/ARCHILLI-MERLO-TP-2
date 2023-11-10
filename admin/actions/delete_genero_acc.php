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
    header('Location: ../index.php?sec=admin_genero');

} catch (Exception $e) {
    echo "<pre>";
    print_r($e);
    echo "</pre>";
    die("No se pudo eliminar el genero");

}
