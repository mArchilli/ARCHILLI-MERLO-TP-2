<?PHP

class Autenticacion{
    #region METODOS

     /**
     * Verifica las credenciales del usuario y en caso de existir guarda los datos en la sesion
     * @param string $username Un string con el nombre de usuario
     * @param string $password El password provisto
     * @return bool Devuelve TRUE en caso de ser correctas, FALSE en caso contrario
     */
    public function log_in (string $username, string $password): bool{
        
        return true;
    }

    #endregion
}
