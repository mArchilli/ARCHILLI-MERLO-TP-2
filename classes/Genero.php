<?php

class Genero{

    #region ATRIBUTOS
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
     * inserta un genero en la tabla generos 
     * @param string $nombre El nombre del genero
     */
    public function insert(string $nombre){
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO generos (`nombre`) 
        VALUES (:nombre)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            "nombre"=> $nombre
        ]);
    }

    /**
     * Modifica un genero de la tabla generos 
     * @param string $nombre El nombre del genero
     */
    public function edit(string $nombre){
        $conexion = Conexion::getConexion();
        $query = "UPDATE generos SET nombre = :nombre WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'id' => $this->id,
            'nombre' => $nombre
        ]);       
    }

    /**
     * Elimina un genero de la tabla generos
     */
    public function delete()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM generos WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'id' => $this->id,
        ]);
    }

    /**
     * Devuelve los datos de un genero en particular 
     * @param int $idGenero El ID del genero
     * @return Genero Un objeto Genero o null
     */
    public function get_x_id(int $idGenero):Genero{
        $conexion = conexion::getConexion();
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
     * @return array Un array asociativo con los generos 
     */
    public function listar_generosPrincipales(): array{

        $conexion = conexion::getConexion();
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

    /**
     * Devuelve los generos principales 
     * @return Genero[] Un array de objetos Genero 
     */
    public function listar_generosTotales(): array{

        $conexion = conexion::getConexion();
        $query = "SELECT id,nombre FROM generos";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();
        $generosPrincipales = $PDOStatement->fetchAll();

        //  echo "<pre>";
        //  print_r($generos);
        //  echo "</pre>";

        return $generosPrincipales;
    }
    #endregion
}