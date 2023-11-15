<?PHP
$id = $_GET['id'] ?? FALSE;

$disco = (new Disco())->catalogo_por_id($id);

$subgeneros_selected = $disco->get_IdSubgeneros();
$generos = (new Genero)->listar_generosTotales();
$artistas = (new Artista)->listado_artistas();



?>


<div class="container">

    <div class="d-flex justify-content-between align-items-center">
        <a href="index.php?sec=admin_disco" role="button" class="btn btn-md btn-danger mb-1">Volver</a>
        <h2 class="fs-1 my-3 fw-bold text-center">Editar Disco <?= $disco->getTitulo() ?></h2>
        <div></div>
    </div>

    <form class="my-3" action="actions/edit_disco_acc.php?id=<?= $disco->getId() ?>" method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="formTitulo" class="form-label">Titulo</label>
            <input class="form-control" type="text" id="formNombre" name="titulo" placeholder="Ingrese el titulo del disco" value="<?= $disco->getTitulo() ?>" required>
        </div>

        <div class="mb-3">
            <label for="artista" class="form-label">Artista:</label>
            <select class="form-select" id="artista" name="artista" required>
                <option value="" disabled selected>Selecciona un artista</option>
                <?PHP foreach ($artistas as $artista) { ?>
                    <option value="<?= $artista->getId();?>" 
                    <?= $artista->getId() == $disco->getArtista()->getId() ? "selected" : "" ?>> 
                    <?= $artista->getNombre(); ?>
                    </option>
                <?PHP } ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="genero" class="form-label">Genero:</label>
            <select class="form-select" id="genero" name="genero" required>
                <option value="" disabled selected>Selecciona un genero</option>
                <?PHP foreach ($generos as $genero) { ?>
                    <option value="<?= $genero->getId();?>" 
                    <?= $genero->getId() == $disco->getGenero()->getId() ? "selected" : "" ?>> 
                    <?= $genero->getNombre(); ?>
                    </option>
                <?PHP } ?>
            </select>
        </div>

        <div class="mb-3 bg-white rounded p-3">
            <label for="subgeneros" class="form-label d-block">Subgeneros:</label>
                <?PHP foreach ($generos as $genero) { ?>
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" name="subgeneros[]" id="subgeneros_<?= $genero->getId(); ?>" value="<?= $genero->getId(); ?>" 
                        <?= in_array($genero->getId(), $subgeneros_selected) ? "checked" : "" ?>>
                        <label for="subgeneros_<?= $genero->getId(); ?>" class="form-check-label mb2"><?= $genero->getNombre(); ?></label>
                    </div>
                <?PHP } ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="formSello" class="form-label">Sello</label>
            <input class="form-control" type="text" id="formSello" name="sello" placeholder="Ingrese el nombre del sello" value="<?= $disco->getSello() ?>">
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Portada actual</label>
            <img src="../img/covers/<?= $disco->getPortada() ?>" alt="Portada de <?= $disco->getTitulo() ?>" class="img-fluid rounded shadow-sw d-block">
            <input class="form-control" type="hidden" id="formFile" name="portada_og" value="<?= $disco->getPortada() ?>">
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Reemplazar portada</label>
            <input class="form-control" type="file" id="formFile" name="portada">
        </div>

        <div class="mb-3">
            <label for="formPublicacion" class="form-label">Año de publicacion</label>
            <input class="form-control" type="number" pattern="\d{4}" min="0" max="9999" name="publicacion" placeholder="4 digitos" value="<?= $disco->getPublicacion() ?>" required>
        </div>

        <div class="mb-3">
            <label for="formPrecio" class="form-label">Precio en ARS</label>
            <input name="precio" class="form-control" type="number" step="0.01" min="0" placeholder="Ingrese el precio" value="<?= $disco->getPrecio() ?>"required>
        </div>

        <div class="mb-3">
            <label for="formControlTextarea" class="form-label">Descripcion</label>
            <textarea class="form-control" id="formControlTextarea" rows="3" name="descripcion" required><?= $disco->getDescripcion() ?></textarea>
        </div>

    <button type="submit" class="btn btn-style w-100 fw-bold my-3">Modificar Disco</button>
    </form>
</div>
