<?PHP

require_once '../../function/autoload.php';
$items = (new Carrito())->get_carrito();
$userID = $_SESSION['loggedIn']['id'] ?? FALSE;

// echo "<pre>";
// print_r($items);
// echo "</pre>";

try {
    if ($userID) {

        $datosCompra = [
            "id_usuario" => $userID,
            "fecha" => date("Y-m-d"),
            "importe" => (new Carrito())->precio_total()
        ];

        $detalleCompra = [];

        foreach ($items as $key => $value) {
            $detalleCompra[$key] = $value['cantidad'];
        }

        // echo "<pre>";
        // print_r($datosCompra);
        // echo "</pre>";

        // echo "<pre>";
        // print_r($detalleCompra);
        // echo "</pre>";

        (new Checkout())->insert_checkout_data($datosCompra, $detalleCompra);
        (new Carrito())->clear_items();

        (new Alerta())->add_alerta('success', 'Su compra fue realizada correctamente. Le enviaremos a su casilla de correo la factura y detalles sobre la entrega.');

        header('Location: ../../index.php?sec=panel_usuario');


    } else {
        (new Alerta())->add_alerta('warning', 'Su sesion expiro. Por favor, ingrese nuevamente.');
        header('Location: ../../index.php?sec=login');
    }
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', 'Ocurrio un error al momento de finalizar la compra');
    header('Location: ../../index.php?sec=panel_usuario');
}
