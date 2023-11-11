<?PHP

$generoSeleccionado = $_GET['gen'] ?? FALSE;


// Formatea los titulos con mayusculas y espacios.
$titulo = ucwords(str_replace("-", " ", $generoSeleccionado), " \t\r\n\f\v-");

$catalogo = (new Disco())->catalogo_por_genero($generoSeleccionado);

// echo "<pre>";
// print_r($generoSeleccionado);
// echo "</pre>";
?>

<div class=" d-flex justify-content-center py-5 px-3">
    <div>
        <h2 class="text-center mb-5 fw-bold fs-1">Nuestro catálogo de <?= $titulo ?> </h2>
        <div class="container px-lg-5">

            <!-- Si el catálogo no esta vacío...-->
            <?PHP if (!empty($catalogo)) { ?>
                <div class="row justify-content-center">
                    <!-- Recorro catálogo y alojo en variable $disco -->
                    <?PHP foreach ($catalogo as $disco) { ?>

                        <div class="col-12 col-md-4">
                            <div class="card my-3">
                                <img src="img/covers/<?= $disco->getPortada() ?>" class="card-img-top" alt="Portada de <?= $disco->getTitulo() ?>">
                                <div class="card-body">
                                    <ul class="list-group list-group-flush d-flex gap-3 flex-row">
                                            <li class="list-group-item border-0 px-0 text-style"><?= $disco->getGenero(); ?></li>
                                            <?PHP foreach ($disco->getSubgeneros() as $subGenero) { ?>
                                            <li class="list-group-item border-0 px-0 text-style"><?= $subGenero->getNombre(); ?></li>
                                            <?PHP } ?>
                                    </ul>
                                    <h2 class="card-title fs-4"><?= $disco->getTitulo() ?></h2>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><span class="fw-bold">Artista:</span> <?= $disco->getArtista() ?></li>            
                                    <li class="list-group-item"><span class="fw-bold">Sello:</span> <?= $disco->getSello() ?></li>
                                    <li class="list-group-item"><span class="fw-bold">Publicación:</span> <?= $disco->getPublicacion() ?></li>
                                </ul>
                                <div class="card-body">
                                    <!-- formatear precios -->
                                    <div class="fs-3 mb-3 fw-bold text-center text-style">$<?= $disco->precio_formateado() ?></div>
                                    <!-- link a pagina de producto -->
                                    <a href="index.php?sec=producto&id=<?= $disco->getId()?>" class="btn btn-style w-100 fw-bold">VER MÁS</a>
                                </div>

                            </div>
                        </div>

                    <?PHP } ?>

                </div>
            <!-- Si el catalogo está vacio -->
            <?PHP } else { ?>
            <div class="col my-md-5 text-center">
                <h2 class="fs-3 my-5 text-error">No se encontraron productos del género buscado</h2>
                <a href="index.php?sec=inicio" class="btn btn-style py-2 px-5 fw-bold fs-5 my-5">VOLVER A INICIO</a>
            </div>
            <?PHP }  ?>
        </div>

    </div>
</div>