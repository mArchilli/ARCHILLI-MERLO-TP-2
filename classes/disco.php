<?PHP


class Disco {

    private $id;
    private $titulo;
    private $id_artista;
    private $id_genero;
    private $descripcion;
    private $sello;
    private $portada;
    private $publicacion;
    private $precio;
    private $disco;
    private $fecha_carga;
    private $genero;
    private $artista;


    /**
     * Devuelve el catalogo de discos completo
     * @return array Un array de objetos Disco
     */
    public function catalogoCompleto():array{

        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM discos";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();
        $catalogo = $PDOStatement->fetchAll();

        //  echo "<pre>";
        //  print_r($catalogo);
        //  echo "</pre>";

        return $catalogo;
    }

    /**
     * Devuelve el catalogo de los discos publicados en una epoca en particular
     * @param string $epoca Un string con el nombre de la epoca
     * @return Disco[] Un array de objetos Disco 
     */
    public function catalogo_por_epoca(string $epoca):array{
        $catalogoXepoca = [];
        $catalogo = $this->catalogoCompleto();

        foreach ($catalogo as $d) {
            if ($d->epoca == $epoca) {
                $catalogoXepoca[] = $d;
            }
        }
        return $catalogoXepoca;
    }

    /**
     * Devuelve el catalogo de los discos publicados en una epoca en particular
     * @param string $genero Un string con el nombre del genero seleccionado
     * @return Disco[] Un array de objetos Disco 
     */
    public function catalogo_por_genero(string $genero):array{
        $catalogoXgenero = [];
        $catalogo = $this->catalogoCompleto();

        foreach ($catalogo as $d) {
        
            foreach ($d->genero as $generos){

                if ($genero == strtolower($generos)) { 

                    $catalogoXgenero[] = $d;
                }
            }
            
        }
        return $catalogoXgenero;
    }

    /**
     * Devuelve los datos de un disco en particular 
     * @param int $idDisco El ID del disco
     * @return Disco Un objeto Disco o null
     */
    public function catalogo_por_id(int $idDisco):?Disco{
        $catalogo = $this->catalogoCompleto();

        foreach ($catalogo as $d) {
            if ($d->id == $idDisco) {
                return $d;
            }
        }
        return null;
    }

    /**
     * Devuelve el precio formateado 
     * @return string precio formateado
     */
    public function precio_formateado():string{
        return number_format($this->precio, 2, ",", ".");
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of publicacion
     */
    public function getPublicacion()
    {
        return $this->publicacion;
    }

    /**
     * Get the value of sello
     */
    public function getSello()
    {
        return $this->sello;
    }

    /**
     * Get the value of portada
     */
    public function getPortada()
    {
        return $this->portada;
    }

    /**
     * Get the value of precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }



    /**
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Get the value of id_artista
     */ 
    public function getId_artista()
    {
        return $this->id_artista;
    }

    /**
     * Get the value of id_genero
     */ 
    public function getId_genero()
    {
        return $this->id_genero;
    }

    /**
     * Get the value of disco
     */ 
    public function getDisco()
    {
        return $this->disco;
    }

    /**
     * Get the value of fecha_carga
     */ 
    public function getFecha_carga()
    {
        return $this->fecha_carga;
    }

    /**
     * Get the value of genero
     */ 
    public function getGenero()
    {
        return "Genero no encontrado";
    }

    /**
     * Get the value of artista
     */ 
    public function getArtista()
    {
        return "Artista no encontrado";
    }
}