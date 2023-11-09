<?PHP

$id = $_GET['id'] ?? FALSE;

$genero = (new Genero())->get_x_id($id);

?>

<div class="container">
    <h2 class="fs-1 my-3 fw-bold text-center">Editar Genero <?= $genero->getNombre() ?></h2>

    <form class="my-3" action="actions/edit_genero_acc.php?id=<?= $genero->getId() ?>" method="POST">
        <div class="mb-3">
            <label for="formNombre" class="form-label">Nombre</label>
            <input class="form-control" type="text" id="formNombre" name="nombre" placeholder="Ingrese el nombre del genero" value="<?= $genero->getNombre()?>">
        </div>
    <button type="submit" class="btn btn-style w-100 fw-bold my-3">Modificar genero</button>
    </form>
</div>
