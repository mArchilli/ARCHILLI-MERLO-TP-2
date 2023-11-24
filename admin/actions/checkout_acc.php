<?PHP

require_once '../../function/autoload.php';
$items = (new Carrito())->get_carrito();
$userID = $_SESSION['loggedIn']['id'];

echo "<pre>";
print_r($items);
echo "</pre>";
