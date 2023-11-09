<?PHP

$listaDeArtistas = (new Artista())->listado_artistas();


?>



<div class="row d-flex justify-content-center align-items-center py-5 px-3">
        <div class="col-12">
            <h2 class="fs-1 my-4 fw-bold text-center">¡Bienvenido al panel de Administracion de Artistas!</h2>
        </div>
    
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" width="10%">Imagen</th>
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
                            <td><img src="../img/artistas/<?= $artista->getImagen() ?>" alt="Imagen de <?= $artista->getNombre() ?>"></td>
                            <td><?= $artista->getNombre()?></td>
                            <td><?= $artista->getNacionalidad()?></td>
                            <td><?= $artista->getDiscografia()?></td>
                            <td><?= $artista->getBiografia()?></td>
                            <td>
                                <a href="index.php?sec=edit_artista&id=<?= $artista->getId() ?>" role="button" class="d-block btn btn-sm btn-warning mb-1">Editar</a>
                                <!-- <a href="index.php?sec=delete_artista&id=<?= $artista->getId() ?>" role="button" class="d-block btn btn-sm btn-danger mb-1">Eliminar</a> -->
                                <a href="javascript:void(0);" onclick="confirmDelete(<?= $artista->getId() ?>)" role="button" class="d-block btn btn-sm btn-danger mb-1">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                
            </table>
            <a href="index.php?sec=add_artista" class="btn btn-style w-100 fw-bold my-3">Cargar nuevo artista</a>
        </div>
        
</div>

<script>
    function confirmDelete(id) {
        var result = confirm("¿Estás seguro de que deseas eliminar este artista?");
        if (result) {
            window.location.href = "actions/delete_artista_acc.php?id=" + id;
        }
    }
</script>