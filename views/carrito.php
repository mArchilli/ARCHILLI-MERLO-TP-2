<?PHP 
$items = (new Carrito())->get_carrito();


// echo "<pre>";
// print_r($items ?? "");
// echo "</pre>";
        
?>

<div class="row justify-content-center">
    <div class="col-12">
        <h2 class="text-center my-4">Carrito de compras</h2>
    </div>
        <div class="col-12">
        <?php if (count($items)) { ?>
            <form action="admin/actions/update_items_acc.php" method="post">
            <table class="table table-borderless table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="25%">Portada</th>
                        <th scope="col">Titulo</th>
                        <th scope="col" width="15%">Precio Unitario</th>
                        <th scope="col" width="15%">Cantidad</th>
                        <th scope="col" width="15%">Subtotal</th>                     
                        <th scope="col" width="10%"></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($items as $key => $item) { ?>
                        <tr>
                            <td><img class="img-fluid rounded shadow-sw d-block" src="img/covers/<?= $item['portada'] ?>" alt="Imagen de <?= $item['titulo'] ?>"></td>
                            <td>
                                <p class="h5 py-3">
                                    <?= $item['titulo'] ?>
                                </p>
                            </td>
                            <td>
                                <p class="h5 py-3">
                                    $<?= number_format($item['precio'], 2, "," ,".") ?>
                                </p>
                            </td>
                            <td>
                                <label for="q_<?= $key ?>" class="h5 py-3 hidden">Cantidad</label>
                                <input type="number" class="form-control" value="<?= $item['cantidad'] ?>" id="q[<?= $key ?>]" min="1" max="99">
                            </td>
                            <td>
                                <p class="h5 py-3">$<?= number_format($item['cantidad'] * $item['precio'], 2, "," ,".") ?></p>
                            </td>
                            <td>
                                <a href="admin/actions/remove_item_acc.php?id=<?= $key ?>" class="btn btn-md btn-danger mb-1">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="4" class="text-end">
                            <h2 class="h5 py-3">Total: </h2>
                        </td>
                        <td>

                        </td>
                        <td></td>
                    </tr>
                </tbody>
                
            </table>
            </form>
            <?php } else { ?>
                <div class="col-12">
                    <h3 class="text-center my-4">El carrito se encuentra vacio</h3>
                    <a href="index.php?sec=catalogo" role="button" class="d-block btn btn-md btn-style mb-1">Ir al catalogo</a>
                </div>
            <?php } ?>

        </div>

        


    
</div>