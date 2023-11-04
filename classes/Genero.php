<?php

class Genero{

    #region METODOS
    private $id;
    private $nombre;
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
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }
    #endregion

    #region METODOS
    /**
     * Devuelve los datos de un genero en particular 
     * @param int $idGenero El ID del genero
     * @return Genero Un objeto Genero o null
     */
    public function get_x_id(int $idGenero):Genero{
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM generos WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$idGenero]);
        $genero = $PDOStatement->fetch();

        //  echo "<pre>";
        //  print_r($artista);
        //  echo "</pre>";

        return $genero;
    }
    #endregion
}