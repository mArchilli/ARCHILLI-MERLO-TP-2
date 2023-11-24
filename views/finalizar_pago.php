<?PHP

$carrito = (new Carrito())->get_carrito();

$user = (new Usuario())->usuario_x_username($_SESSION['loggedIn']['nombre_usuario']);

?>

<div class="row justify-content-center">
    <div class="col-12">
        <h2 class="text-center my-4">Finalizar pago</h2>
    </div>

    <div class="col-12 col-lg-4">
        <section class="d-flex flex-column align-items-center">
            <h3>Datos del usuario</h3>
            <p class="fs-5"><span class="fw-bold">Nombre de usuario:</span> <?= $user->getNombre_usuario() ?></p>
            <p class="fs-5"><span class="fw-bold">Nombre completo:</span> <?= $user->getNombre_completo() ?></p>
            <p class="fs-5"><span class="fw-bold">Correo electronico</span>  <?= $user->getEmail() ?></p>
        </section>

    </div>
    <div class="col-12 col-lg-8">
        <section>
        <h3>Datos de la compra</h3>
            <table class="table table-borderless table-hover">
                <thead>
                    <tr>

                        <th scope="col">Titulo</th>
                        <th scope="col" width="15%">Precio Unitario</th>
                        <th scope="col" width="15%">Cantidad</th>
                        <th scope="col" width="15%">Subtotal</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($carrito as $key => $item) { ?>
                        <tr>
                            <td>
                                <p class="h5 py-3">
                                    <?= $item['titulo'] ?>
                                </p>
                            </td>
                            <td>
                                <p class="h5 py-3">
                                    $ <?= number_format($item['precio'], 2, ",", ".") ?>
                                </p>
                            </td>
                            <td>
                                <p class="h5 py-3"> <?= $item['cantidad'] ?> </p>
                            </td>
                            <td>
                                <p class="h5 py-3">$ <?= number_format($item['cantidad'] * $item['precio'], 2, ",", ".") ?></p>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="3" class="text-end">
                            <h2 class="h5 py-3">Total: </h2>
                        </td>
                        <td>
                            <p class="h5 py-3">
                                $ <?= number_format((new Carrito())->precio_total(), 2, ",", ".") ?>
                            </p>
                        </td>
                        <td></td>
                    </tr>
                </tbody>

            </table>
        </section>
    </div>

    <div class="col-12">
        <a href="admin/actions/checkout_acc.php" role="button" class="btn btn-style w-100 fw-bold">Pagar</a>
    </div>
</div>