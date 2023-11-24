<?PHP

$user = (new Usuario())->usuario_x_username($_SESSION['loggedIn']['nombre_usuario']);

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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>