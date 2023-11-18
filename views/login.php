
<div class="d-flex align-items-center justify-content-center">
    <form action="admin/actions/auth_login.php" method="POST" class="my-5 py-5">
            <h2 class="h3 mb-3 fw-normal text-center">Iniciar sesion</h2>

            <div>
                <?= (new Alerta())->get_alertas(); ?>
            </div>

            <div class="row align-items-center justify-content-center">
                <div class="col-12 col">
                    <div class="form-floating my-3">
                    <input type="text" class="form-control" id="floatingUserName" placeholder="Username" name="username">
                    <label for="floatingUserName">Username</label>
                    </div>
                </div>

                <div class="col-12 col">
                    <div class="form-floating my-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                    <label for="floatingPassword">Password</label>
                    </div>
                </div>
            </div>
            
            <button class="btn btn-style w-100 fw-bold my-3" type="submit">Ingresar</button>
    </form>
</div>
