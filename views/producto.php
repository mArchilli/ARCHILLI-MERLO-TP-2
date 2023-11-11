<?PHP

$id = $_GET['id'] ?? FALSE;

$disco = (new Disco())->catalogo_por_id($id);

?>

<div class="container">

    <div class="row">
        <?PHP if (!empty($disco)) { ?>
            <div class="col">
                <div class="card m-5">
                    <div class="row g-0">
                        <div class="col-md-5 d-flex">
                            <img src="img/covers/<?= $disco->getPortada(); ?>" class="img-fluid rounded-start border-end" alt="Portada de <?= $disco->getTitulo();?>">
                        </div>
                        <div class="col-md-7 d-flex flex-column p-3">
                            <div class="card-body flex-grow-0">
                                    <ul class="list-group list-group-flush d-flex gap-3 flex-row">
                                        <li class="list-group-item border-0 px-0 text-style"><?= $disco->getGenero(); ?></li>
                                        <?PHP foreach ($disco->getSubgeneros() as $subGenero) { ?>
                                        <li class="list-group-item border-0 px-0 text-style"><?= $subGenero->getNombre(); ?></li>
                                        <?PHP } ?>
                                    </ul>
                                </li>
                                    
                                <h2 class="card-title fw-bold mb-1"><?= $disco->getTitulo(); ?></h2>
                            </div>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><?= $disco->getDescripcion(); ?></li>
                                <li class="list-group-item"><span class="fw-bold">Artista:</span> <?= $disco->getArtista(); ?></li>
                                <li class="list-group-item"><span class="fw-bold">Sello:</span> <?= $disco->getSello(); ?></li>
                                <li class="list-group-item"><span class="fw-bold">Publicación:</span> <?= $disco->getPublicacion(); ?></li>

                            </ul>

                            <div class="card-body flex-grow-0 mt-auto">
                                <div class="fs-3 mb-3 fw-bold text-center text-style">$<?= $disco->precio_formateado();?></div>
                                <a href="#" class="btn btn-style w-100 fw-bold">COMPRAR</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        <?PHP } else { ?>
            <div class="col my-md-5 text-center">
                <h2 class="fs-1 my-5">No se encontró el producto buscado</h2>
                <a href="index.php?sec=inicio" class="btn btn-style py-2 px-5 fw-bold fs-5 mb-5">VOLVER A INICIO</a>
            </div>
        <?PHP } ?>
    </div>

</div>