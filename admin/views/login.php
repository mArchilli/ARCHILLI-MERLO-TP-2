<div class="container">
    <form action="actions/auth_login.php" method="POST" class="my-3">
        <h2 class="h3 mb-3 fw-normal text-center">Iniciar sesion</h2>

        <div class="form-floating my-2">
            <input type="text" class="form-control" id="floatingInput" name="username">
            <label for="floatingInput">Username</label>
        </div>

        <div class="form-floating my-2">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Password</label>
        </div>

        <button class="btn btn-style w-100 fw-bold my-3" type="submit">Ingresar</button>
    </form>
</div>