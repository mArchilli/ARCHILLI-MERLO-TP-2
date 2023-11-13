<?PHP 

class Usuario
{
    #region ATRIBUTOS
    private $id;
    private $email;
    private $nombre_usuario;
    private $nombre_completo;
    private $password;
    private $rol;
    #endregion

    #region GETTERS
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the value of nombre_usuario
     */ 
    public function getNombre_usuario()
    {
        return $this->nombre_usuario;
    }

    /**
     * Get the value of nombre_completo
     */ 
    public function getNombre_completo()
    {
        return $this->nombre_completo;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the value of rol
     */ 
    public function getRol()
    {
        return $this->rol;
    }
    #endregion

    #region METODODS
    
    /**
     * Devuelve un Usuario obtenido a traves del nombre de usuario
     * @param string $username Un string con el nombre de usuario
     * @return Usuario Un objeto usuario o null en caso de no existir
     */
    public function usuario_x_username(string $username): ?Usuario{
        $conexion = Conexion::getConexion();

        $query = "SELECT * FROM usuarios WHERE nombre_usuario = :nombre_usuario";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([
            "nombre_usuario" => $username
        ]);
        $usuario = $PDOStatement->fetch();

        if(!$usuario){
            return null;
        } else {
            return $usuario;
        }
    }
    #endregion
}
