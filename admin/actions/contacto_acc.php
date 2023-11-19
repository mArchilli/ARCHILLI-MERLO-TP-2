<?PHP
require_once '../../function/autoload.php';

(new Alerta())->add_alerta('success', "Correo enviado correctamente.");
header('location: ../../index.php?sec=contacto');