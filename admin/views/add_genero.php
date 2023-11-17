<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <a href="index.php?sec=admin_genero" role="button" class="btn btn-md btn-danger mb-1">Volver</a>
        <h2 class="fs-1 my-3 fw-bold text-center">Agregar nuevo Genero</h2>
        <div></div>
    </div>
    

    <form class="my-3" action="actions/add_genero_acc.php" method="POST">
        <div class="mb-3">
            <label for="formNombre" class="form-label">Nombre</label>
            <input class="form-control" type="text" id="formNombre" name="nombre" placeholder="Ingrese el nombre del genero">
        </div>
    <button type="submit" class="btn btn-style w-100 fw-bold my-3">Agregar nuevo genero</button>
    </form>
</div>
