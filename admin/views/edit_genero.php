<?PHP

$id = $_GET['id'] ?? FALSE;

// echo "<pre>";
// print_r($id);
// echo "</pre>";

$genero = (new Genero())->get_x_id($id);

// echo "<pre>";
// print_r($genero);
// echo "</pre>";
?>

<div class="container">
<?PHP if ($genero != null) { ?>
    <div class="d-flex justify-content-between align-items-center">
        <a href="index.php?sec=admin_genero" role="button" class="btn btn-md btn-danger mb-1">Volver</a>
        <h2 class="fs-1 my-3 fw-bold text-center">Editar Genero <?= $genero->getNombre() ?></h2>
        <div></div>
    </div>

    <form class="my-3" action="actions/edit_genero_acc.php?id=<?= $genero->getId() ?>" method="POST">
        <div class="mb-3">
            <label for="formNombre" class="form-label">Nombre</label>
            <input class="form-control" type="text" id="formNombre" name="nombre" placeholder="Ingrese el nombre del genero" value="<?= $genero->getNombre()?>">
        </div>
    <button type="submit" class="btn btn-style w-100 fw-bold my-3">Modificar genero</button>
    </form>
    <?PHP } else { ?>
        <div class="col my-md-5 text-center">
                <h2 class="fs-3 my-5 text-error">No se encontro el género buscado</h2>
                <a href="index.php?sec=dashboard" class="btn btn-style py-2 px-5 fw-bold fs-5 my-5">Volver al Dashboard</a>
        </div>
    <?PHP } ?>
</div>
