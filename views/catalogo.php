<?PHP

$objetoDisco = new Disco();

$catalogo = $objetoDisco->catalogoCompleto();

// echo "<pre>";
// print_r($catalogo);
// echo "</pre>";
?>

<div class=" d-flex justify-content-center py-5 px-3">
    <div>
        <h2 class="text-center mb-5 fw-bold fs-1">Conocé nuestro <?= $titulo ?></h2>
        <div class="container px-lg-5">

            <!-- Si el catálogo no esta vacío...-->
            <?PHP if (!empty($catalogo)) { ?>
                <div class="row justify-content-center">
                    <!-- Recorro catálogo y alojo en variable $disco -->
                    <?PHP foreach ($catalogo as $disco) { ?>

                        <div class="col-12 col-md-4">
                            <div class="card my-3">
                                <img src="img/covers/<?= $disco->getPortada() ?>" class="card-img-top" alt="Portada de <?= $disco->getDisco() ?>">
                                <div class="card-body">
                                    <li class="list-group-item">
                                        <ul class="list-group list-group-flush d-flex gap-3 flex-row">
                                        <?PHP foreach ($disco->getGenero() as $genero) { ?>
                                            <li class="list-group-item px-0 text-style"><?= $genero ?></li>
                                            <?PHP } ?>
                                        </ul>
                                    </li>
                                    <h2 class="card-title fs-4 m-0"><?= $disco->getDisco() ?></h2>
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
                <div class="row">
                    <div class="col-12 text-danger text-center h1"> NO SE ENCONTRARON PRODUCTOS</div>
                </div>
            <?PHP }  ?>
        </div>

    </div>
</div>