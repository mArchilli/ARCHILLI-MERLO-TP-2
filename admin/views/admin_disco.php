<?PHP

$listaDeDiscos = (new Disco())->catalogoCompleto();


?>

<div class="row d-flex justify-content-center align-items-center py-5 px-3">
        <div class="col-12">
            <h2 class="fs-1 my-4 fw-bold text-center">¡Bienvenido al panel de Administracion de Discos!</h2>
        </div>

        <div class="d-flex">
            <a href="index.php?sec=dashboard" class="btn btn-style w-25 m-auto fw-bold my-3">Volver al dashboard</a>
            <a href="index.php?sec=add_disco" class="btn btn-style w-25 m-auto fw-bold my-3">Cargar nuevo disco</a>
        </div>

        <div>
            <?= (new Alerta())->get_alertas(); ?>
        </div>

        <div class="col-12">
            <table class="table table-borderless table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="25%">Portada</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Publicacion</th>
                        <th scope="col">Artista</th>
                        <th scope="col">Genero</th>
                        <th scope="col">Subgeneros</th>
                        <th scope="col">Sello</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Fecha de Carga</th>                     
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($listaDeDiscos as $disco) { ?>
                        <tr>
                            <td><img class="img-fluid rounded shadow-sw d-block" src="../img/covers/<?= $disco->getPortada() ?>" alt="Imagen de <?= $disco->getTitulo() ?>"></td>
                            <td><?= $disco->getTitulo() ?></td>
                            <td><?= $disco->getPublicacion() ?></td>
                            <td><?= $disco->getArtista()->getNombre() ?></td>
                            <td><?= $disco->getGenero()->getNombre() ?></td>
                            <td>
                            <?PHP foreach ($disco->getSubgeneros() as $subgenero) { 
                               echo "<p>" . $subgenero->getNombre() . "</p>";
                            } ?>
                            </td>
                            <td><?= $disco->getSello() ?></td>
                            <td>$<?= $disco->getPrecio() ?></td>
                            <td><?= $disco->getFecha_carga() ?></td>
                            <td>
                                <a href="index.php?sec=edit_disco&id=<?= $disco->getId() ?>" role="button" class="d-block btn btn-md btn-warning mb-1">Editar</a>
                                <a href="javascript:void(0);" onclick="confirmDelete( '<?= $disco->getId() ?>','<?= $disco->getTitulo() ?>')" role="button" class="d-block btn btn-md btn-danger mb-1">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                
            </table>
            
        </div>
    
</div>

<script>
    function confirmDelete(id, titulo) {
        var result = confirm(`¿Estás seguro de que deseas eliminar el disco ${titulo}?`);
        if (result) {
            window.location.href = "actions/delete_disco_acc.php?id=" + id;
        }
    }
</script>
