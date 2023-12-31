<?php

class Artista{

    #region ATRIBUTOS
    private $id;
    private $nombre; 
    private $nacionalidad;
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
     * inserta un artista en la tabla artistas 
     * @param string $nombre El nombre del artista
     * @param string $nacionalidad La nacionalidad del artista
     * @param string $biografia La biografia del artista
     * @param string $imagen La ruta de la imagen de portada .jpg o .png
     */
    public function insert(string $nombre, string $nacionalidad, string $biografia, string $imagen){
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO artistas (`nombre`, `nacionalidad`, `biografia`, `imagen`) 
        VALUES (:nombre, :nacionalidad, :biografia, :imagen)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            "nombre"=> $nombre,
            "nacionalidad"=> $nacionalidad,
            "biografia"=> $biografia,
            "imagen"=> $imagen,
        ]);
    }

    /**
     * Modifica un artista de la tabla artistas 
     * @param string $nombre El nombre del artista
     * @param string $nacionalidad La nacionalidad del artista
     * @param string $biografia La biografia del artista
     * @param string $imagen La ruta de la imagen de portada .jpg o .png
     */
    public function edit(string $nombre, string $nacionalidad, string $biografia, string $imagen){
        $conexion = Conexion::getConexion();
        $query = "UPDATE artistas SET nombre = :nombre, nacionalidad = :nacionalidad ,biografia = :biografia, imagen = :imagen WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'id' => $this->id,
            'nombre' => $nombre,
            'nacionalidad' => $nacionalidad,
            'biografia' => $biografia,
            'imagen' => $imagen,
        ]);       
    }

     /**
     * Elimina un artista de la tabla artistas
     */
    public function delete()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM artistas WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'id' => $this->id,
        ]);
    }

    /**
     * Devuelve los datos de un artista en particular 
     * @param int $idArtista El ID del artista
     * @return Artista Un objeto Artista o null
     */
    public function get_x_id(int $idArtista): ?Artista{
        $conexion = conexion::getConexion();
        $query = "SELECT * FROM artistas WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$idArtista]);
        $artista = $PDOStatement->fetch();

        //  echo "<pre>";
        //  print_r($artista);
        //  echo "</pre>";

        if($artista){
            return $artista;
        }else{
            return null;
        }
    }

    /**
     * Devuelve el listado completo de artistas
     * @return Artista[] Un array de objetos Artista 
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

    /**
     * Mostrar discografía del artista
     */
    public function mostrarDiscografia() {
        $discos = (new Disco)->disco_x_artista($this->id);
        
        return $discos;

    }
    #endregion

    
}