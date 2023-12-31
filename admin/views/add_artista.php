<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <a href="index.php?sec=admin_artista" role="button" class="btn btn-md btn-danger mb-1">Volver</a>
        <h2 class="fs-1 my-3 fw-bold text-center">Agregar nuevo Artista</h2>
        <div></div>
    </div>
    
<div class="d-flex align-items-center justify-content-center">
    <form class="my-3" action="actions/add_artista_acc.php" method="POST" enctype="multipart/form-data">

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label for="formNombre" class="form-label">Nombre</label>
                    <input class="form-control" type="text" id="formNombre" name="nombre" placeholder="Ingrese el nombre del artista">
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label for="nacionalidad" class="form-label">Nacionalidad:</label>
                    <select class="form-select" id="nacionalidad" name="nacionalidad" required>
                        <option value="" disabled selected>Selecciona un país</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Brasil">Brasil</option>
                        <option value="Canadá">Canadá</option>
                        <option value="Chile">Chile</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Estados Unidos">Estados Unidos</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Honduras">Honduras</option>
                        <option value="México">México</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Panamá">Panamá</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Perú">Perú</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Alemania">Alemania</option>
                        <option value="España">España</option>
                        <option value="Francia">Francia</option>
                        <option value="Italia">Italia</option>
                        <option value="Reino Unido">Reino Unido</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Suecia">Suecia</option>
                        <option value="Noruega">Noruega</option>
                        <option value="Suiza">Suiza</option>
                        <option value="Países Bajos">Países Bajos</option>
                        <option value="Canadá">Canadá</option>
                        <option value="Estados Unidos">Estados Unidos</option>
                        <option value="México">México</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Belice">Belice</option>
                        <option value="Honduras">Honduras</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Panamá">Panamá</option>
                    </select>
                </div>
            </div>

            <div class="col-12">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Seleccione la imagen de perfil del artista</label>
                    <input class="form-control" type="file" id="formFile" name="imagen">
                </div>
            </div>

            <div class="col-12">
                <div class="mb-3">
                    <label for="formControlTextarea" class="form-label">Biografia</label>
                    <textarea class="form-control" id="formControlTextarea" rows="3" name="biografia"></textarea>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-style w-100 fw-bold my-3">Agregar nuevo artista</button>
            </div>
        </div>
    </form>
</div>
