<?php

class Artista{

    #region ATRIBUTOS
    private $id;
    private $nombre; 
    private $nacionalidad;
    private $discografia;
    private $biografia;
    private $imagen;
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

    /**
     * Get the value of nacionalidad
     */ 
    public function getNacionalidad()
    {
        return $this->nacionalidad;
    }

    /**
     * Get the value of discografia
     */ 
    public function getDiscografia()
    {
        return $this->discografia;
    }

    /**
     * Get the value of biografia
     */ 
    public function getBiografia()
    {
        return $this->biografia;
    }

    /**
     * Get the value of imagen
     */ 
    public function getImagen()
    {
        return $this->imagen;
    }
    #endregion

    #region METODOS
    /**
     * Devuelve los datos de un artista en particular 
     * @param int $idArtista El ID del artista
     * @return Artista Un objeto Artista o null
     */
    public function get_x_id(int $idArtista):Artista{
        $conexion = conexion::getConexion();
        $query = "SELECT * FROM artistas WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$idArtista]);
        $artista = $PDOStatement->fetch();

        //  echo "<pre>";
        //  print_r($artista);
        //  echo "</pre>";

        return $artista;
    }

    /**
     * Devuelve el listado completo de artistas
     */
    public function listado_artistas(): array{
        $conexion = conexion::getConexion();
        $query = "SELECT * FROM artistas";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();
        $artistas = $PDOStatement->fetchAll();

        //  echo "<pre>";
        //  print_r($artistas);
        //  echo "</pre>";

        return $artistas;
    }
    #endregion

    
}