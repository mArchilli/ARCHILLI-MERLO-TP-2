<?PHP

$listaDeArtistas = (new Artista())->listado_artistas();

// echo "<pre>";
// print_r($listaDeDiscos);
// echo "</pre>";

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

?>



<div class="row d-flex justify-content-center align-items-center py-5 px-3">
        <div class="col-12">
            <h2 class="fs-1 my-4 fw-bold text-center">¡Bienvenido al panel de Administracion de Artistas!</h2>
        </div>
        
        <div class="d-flex ">
            <a href="index.php?sec=dashboard" class="btn btn-style w-25 m-auto fw-bold my-3">Volver al dashboard</a>
            <a href="index.php?sec=add_artista" class="btn btn-style w-25 m-auto fw-bold my-3">Cargar nuevo artista</a>
        </div>

        <div>
            <?= (new Alerta())->get_alertas(); ?>
        </div>
        
        <div class="col-12">
            <table class="table table-borderless table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="25%">Imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Nacionalidad</th>
                        <th scope="col">Discografia</th>
                        <th scope="col" width="45%">Biografia</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($listaDeArtistas as $artista) { ?>
                        <tr>
                            <td><img class="img-fluid rounded shadow-sw d-block" src="../img/artistas/<?= $artista->getImagen() ?>" alt="Imagen de <?= $artista->getNombre() ?>"></td>
                            <td><?= $artista->getNombre()?></td>
                            <td><?= $artista->getNacionalidad()?></td>
                            <td>
                            <?php $discografia = $artista->mostrarDiscografia(); ?>
                            <?php foreach ($discografia as $disco) { ?>
                            <p><?= $disco->getTitulo() ?></p>
                            <?php } ?>
                            </td>
                            <td><?= $artista->getBiografia()?></td>
                            <td>
                                <a href="index.php?sec=edit_artista&id=<?= $artista->getId() ?>" role="button" class="d-block btn btn-md btn-warning mb-1">Editar</a>
                                <a href="javascript:void(0);" onclick="confirmDelete( '<?= $artista->getId() ?>','<?= $artista->getNombre() ?>')" role="button" class="d-block btn btn-md btn-danger mb-1">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                
            </table>
            
        </div>
        
</div>

<script>
    function confirmDelete(id, nombre) {
        var result = confirm(`¿Estás seguro de que deseas eliminar al artista ${nombre}?`);
        if (result) {
            window.location.href = "actions/delete_artista_acc.php?id=" + id;
        }
    }
</script>