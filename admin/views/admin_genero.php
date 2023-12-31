<?PHP

$listaDeGeneros = (new Genero())->listar_generosTotales();

?>

<div class="row d-flex justify-content-center align-items-center py-5 px-3">
        <div class="col-12">
            <h2 class="fs-1 my-4 fw-bold text-center">¡Bienvenido al panel de Administracion de Generos!</h2>
        </div>

        <div class="d-flex">
            <a href="index.php?sec=dashboard" class="btn btn-style w-25 m-auto fw-bold my-3">Volver al dashboard</a>
            <a href="index.php?sec=add_genero" class="btn btn-style w-25 m-auto fw-bold my-3">Cargar nuevo genero</a>
        </div>

        <div>
            <?= (new Alerta())->get_alertas(); ?>
        </div>
    
        <div class="col-12">
            <table class="table table-borderless table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="95%">Nombre</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($listaDeGeneros as $genero) { ?>
                        <tr>
                            <td><?= $genero->getNombre() ?></td>
                            <td>
                                <a href="index.php?sec=edit_genero&id=<?= $genero->getId() ?>" role="button" class="d-block btn btn-md btn-warning mb-1">Editar</a>
                                <a href="javascript:void(0);" onclick="confirmDelete( '<?= $genero->getId() ?>','<?= $genero->getNombre() ?>')" role="button" class="d-block btn btn-md btn-danger mb-1">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                
            </table>
        </div>
        
</div>

<script>
    function confirmDelete(id, nombre) {
        var result = confirm(`¿Estás seguro de que deseas eliminar el genero ${nombre}?`);
        if (result) {
            window.location.href = "actions/delete_genero_acc.php?id=" + id;
        }
    }
</script>