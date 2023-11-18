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

        //Se fija si existe
        if($datosUsuario){
            //USERNAME ENCONTRADO verifica la password
            if(password_verify($password, $datosUsuario->getClave())){
                //PASSWORD CORRECTA retorna TRUE
                
                $datosLogin['nombre_usuario'] = $datosUsuario->getNombre_usuario();
                $datosLogin['nombre_completo'] = $datosUsuario->getNombre_completo();
                $datosLogin['id'] = $datosUsuario->getId();
                $datosLogin['rol'] = $datosUsuario->getRol();
                $_SESSION['loggedIn'] = $datosLogin;

                return $datosLogin['rol'];
            }else{
                //PASSWORD INCORRECTA retorna FALSE
                (new Alerta())->add_alerta('warning', 'Contraseña incorrecta.');
                return FALSE;
            }
        }else{
            //USERNAME NO ENCONTRADO retorna NULL
            (new Alerta())->add_alerta('warning', 'Usuario no encontrado.');
            return NULL;
        }
        
    }

    /**
     * Cierra la sesion
     */
    public function log_out()
    {
        if(isset($_SESSION['loggedIn'])){
            unset($_SESSION['loggedIn']);
        }
    }

    /**
     * Verifica si exista una conexion
     * @return bool Devuelve TRUE en caso de existir sino ejecuta el header
     */
    public function verify($admin = TRUE): bool{
        if(isset($_SESSION['loggedIn'])){

            if ($admin) {
                if($_SESSION['loggenIn']['rol'] == "admin" OR $_SESSION['loggenIn']['rol'] == "superadmin"){
                    return TRUE;
                } else {
                    (new Alerta())->add_alerta('warning', "El usuario no tiene los permisos necesarios para ingresar en este area.");
                    header('Location: index.php?sec=login');
                }
                
            } else {
                return TRUE;
            }
        } else {
            header('location: index.php?sec=login');
        }
    }

    #endregion
}
