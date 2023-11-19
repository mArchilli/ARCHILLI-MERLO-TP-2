<div class="row">
    <div class="col-12 py-4">
         <h2 class="text-center fw-bold fs-1">¡Contanos que disco nos olvidamos de agregar!</h2>
    </div>
    <div class="col-12">
        <div>
            <?= (new Alerta())->get_alertas(); ?>
        </div>
    </div>
    <div class="col-12 mb-5 py-3">
        <div class="row">
            <div class="col-12 col-xl-7">
                <img src="img/vinilo-contacto.webp" alt="Tocadiscos Vintage" class="img-fluid rounded-3"> 
            </div>

            <div class="col-12 col-xl-5">
                <form action="admin/actions/contacto_acc.php" method="POST">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="inputNombre" class="form-label inputContacto">Nombre*</label>
                                <input type="text" class="form-control" id="inputNombre" name="nombre" required>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="inputEmail" class="form-label inputContacto">Correo electronico*</label>
                                <input type="email" class="form-control" id="inputEmail" name="email" required>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="inputNombreDisco" class="form-label ">Nombre del disco*</label>
                                <input type="text" class="form-control" id="inputNombreDisco" name="nombreDisco" required>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="inputNombreArtista" class="form-label inputContacto">Nombre del artista/banda*</label>
                                <input type="text" class="form-control" id="inputNombreArtista" name="nombreArtista" required>
                            </div>
                        </div> 
                        
                        <div class="col-12">
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="newsletterCheck" name="newsletter" required>
                                <label class="form-check-label" for="newsletterCheck">Acepto inscribirme al Newsletter</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-style w-100 fw-bold"><span class="text-uppercase">Enviar</span></button>
                        </div>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>