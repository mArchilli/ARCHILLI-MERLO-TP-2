<?PHP

require_once '../../function/autoload.php';

(new Autenticacion())->log_out();

header('location: ../index.php?sec=login');