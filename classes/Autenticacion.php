<?PHP

class Autenticacion{
    #region METODOS

     /**
     * Verifica las credenciales del usuario y en caso de existir guarda los datos en la sesion
     * @param string $username Un string con el nombre de usuario
     * @param string $password El password provisto
     * @return bool Devuelve TRUE en caso de ser correctas, FALSE en caso contrario
     */
    public function log_in (string $username, string $password): ?bool{
        
        //Crea el objeto usuario con el username
        $datosUsuario = (new Usuario())->usuario_x_username($username);

        //Se fija si existe
        if($datosUsuario){
            echo "<p>USERNAME ENCONTRADO</p>";
            //En caso de existir verifica la password
            if(password_verify($password, $datosUsuario->getPassword())){
                //En caso de coincidir retorna TRUE
                echo "<p>PASSWORD CORRECTA</p>";
                return true;
            }else{
                //En caso de NO coincidir retorna FALSE
                echo "<p>PASSWORD INCORRECTA</p>";
                return false;
            }
        }else{
            //En caso de no encontrar el Username retorna NULL
            echo "<p>USERNAME NO ENCONTRADO</p>";
            return NULL;
        }
        
    }

    #endregion
}
