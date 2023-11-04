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

    /**
     * Devuelve los generos principales 
     */
    public function listar_generosPrincipales(): array{

        $conexion = (new Conexion())->getConexion();
        $query = "SELECT DISTINCT generos.id, generos.nombre 
        FROM discos 
        JOIN generos
        ON discos.id_genero = generos.id;";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();
        $generosPrincipales = $PDOStatement->fetchAll();

        //  echo "<pre>";
        //  print_r($generos);
        //  echo "</pre>";

        return $generosPrincipales;
    }
    #endregion
}