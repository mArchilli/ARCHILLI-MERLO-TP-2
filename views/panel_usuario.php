<?PHP

$user = (new Usuario())->usuario_x_username($_SESSION['loggedIn']['nombre_usuario']);
$idUsuario = $user->getId();

$compras = (new Compra())->compras_por_usuario($idUsuario);

// echo "<pre>";
// print_r($user);
// echo "</pre>";

// echo "<pre>";
// print_r($idUsuario);
// echo "</pre>";

// echo "<pre>";
// print_r($compras);
// echo "</pre>";

?>

<div class="row my-5">
    <div class="col-12">
        <h2 class="text-center my-4">Panel de usuario</h2>
    </div>

    <div>
        <?= (new Alerta())->get_alertas(); ?>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="row">
                <div class="col-12 col-md-6">
                    <img src="img/user.webp" class="card-img-top" alt="Imagen por defecto de un usuario">
                </div>
                <div class="col-12 col-md-6">
                    <div class="card-body d-flex flex-column justify-content-between h-100 ">
                        <h3 class="card-title text-center"><span class="fw-bold">Bienvenido</span> <?= $user->getNombre_usuario() ?></h3>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span class="fw-bold">Nombre completo:</span> <?= $user->getNombre_completo() ?></li>
                            <li class="list-group-item"><span class="fw-bold">Correo electronico:</span> <?= $user->getEmail() ?></li>
                            <li class="list-group-item"><span class="fw-bold">Rol:</span> <?= $user->getRol() ?></li>
                        </ul>
                        <div class="contenedor-compras">
                            <h3 class="card-title text-center"><span class="fw-bold">Historial de compras</span></h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" width="20%">Fecha</th>
                                        <th scope="col" >Detalle</th>
                                        <th scope="col" >Importe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?PHP foreach ($compras as  $compra) { ?>
                                        <tr>
                                            <td class="align-middle">
                                                <p><?= $compra['fecha'] ?></p>
                                            </td>
                                            <td class="align-middle">
                                                <p><?= $compra['detalle'] ?></p>
                                            </td>
                                            <td class="align-middle">
                                                <p>$ <?= $compra['importe'] ?></p>
                                            </td>
                                        </tr>
                                    <?PHP } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>