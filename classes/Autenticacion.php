<?PHP

class Autenticacion{
    #region METODOS

     /**
     * Verifica las credenciales del usuario y en caso de existir guarda los datos en la sesion
     * @param string $username Un string con el nombre de usuario
     * @param string $password El password provisto
     * @return bool Devuelve TRUE en caso de ser correctas, FALSE en caso contrario
     */
    public function log_in(string $username, string $password): ?bool{
        
        //Crea el objeto usuario con el username
        $datosUsuario = (new Usuario())->usuario_x_username($username);

        // echo "<pre>";
        // print_r("El username es:" . $username);
        // echo "</pre>";

        // echo "<pre>";
        // echo "<p> Los datos del usuario son:</p>";
        // print_r($datosUsuario);
        // echo "</pre>";

        // echo "<pre>";
        // print_r("La password es:" . $password);
        // echo "</pre>";

        //Se fija si existe
        if($datosUsuario){
            echo "<p>USERNAME ENCONTRADO</p>";
            //En caso de existir verifica la password
            if(password_verify($password, $datosUsuario->getClave())){
                //En caso de coincidir retorna TRUE
                echo "<p>PASSWORD CORRECTA</p>";
                
                $datosLogin['nombre_usuario'] = $datosUsuario->getNombre_usuario();
                $datosLogin['nombre_completo'] = $datosUsuario->getNombre_completo();
                $datosLogin['id'] = $datosUsuario->getId();
                $datosLogin['rol'] = $datosUsuario->getRol();
                $_SESSION['loggedIn'] = $datosLogin;

                return TRUE;
            }else{
                //En caso de NO coincidir retorna FALSE
                echo "<p>PASSWORD INCORRECTA</p>";
                return FALSE;
            }
        }else{
            //En caso de no encontrar el Username retorna NULL
            echo "<p>USERNAME NO ENCONTRADO</p>";
            return NULL;
        }
        
    }

    public function log_out()
    {
        if(isset($_SESSION['loggedIn'])){
            unset($_SESSION['loggedIn']);
        }
    }

    public function verify(): bool{
        if(isset($_SESSION['loggedIn'])){
            return TRUE;
        } else {
            header('location: index.php?sec=login');
        }
    }

    #endregion
}
