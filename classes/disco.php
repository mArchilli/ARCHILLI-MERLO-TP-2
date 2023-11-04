<?PHP


class Disco {

    #region ATRIBUTOS
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
    #endregion

    #region GETTERS
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
        $genero = (new Genero)->get_x_id($this->id_genero);
        $nombre = $genero->getNombre();

        return $nombre;
    }

    /**
     * Get the value of artista
     */ 
    public function getArtista()
    {
        $artista = (new Artista)->get_x_id($this->id_artista);
        $nombre = $artista->getNombre();

        return $nombre;
    }
    #endregion

    #region METODOS
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
     * @param string $fechaPublicacion Un string con el año de publicacion
     * @return Disco[] Un array de objetos Disco 
     */
    public function catalogo_por_epoca(string $epoca):array{

        $conexion = (new Conexion())->getConexion();
        $where = '';

        switch ($epoca) {
            case '1980':
                $where = 'publicacion >= 1980 AND publicacion <= 1989';
                break;
            case '1990':
                $where = 'publicacion >= 1990 AND publicacion <= 1999';
                break;
            case '2000':
                $where = 'publicacion >= 2000 AND publicacion <= 2009';
                break;
            default:
                echo "<pre>";
                print_r("Decada no encontrada");
                echo "</pre>";
                break;
        }

        // Luego, construye tu consulta SQL con la cláusula WHERE dinámica
        $query = "SELECT * FROM discos WHERE " . $where;

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();
        $catalogo = $PDOStatement->fetchAll();

        // echo "<pre>";
        // print_r($catalogo);
        // echo "</pre>";

        return $catalogo;
    }

    /**
     * Devuelve el catalogo de los discos publicados con un genero en particular
     * @param string $genero Un string con el nombre del genero seleccionado
     * @return Disco[] Un array de objetos Disco 
     */
    public function catalogo_por_genero(string $genero):array{
        $conexion = (new Conexion())->getConexion();
        $where = '';

        if ($genero == 'pop' || $genero ==  'rock' || $genero ==  'Jazz'){
            $where = 'generos.nombre = ?';
        } else {
            echo "<pre>";
            print_r("Genero no encontrada");
            echo "</pre>";
        }

        // Luego, construye tu consulta SQL con la cláusula WHERE dinámica
        $query = "SELECT * FROM discos JOIN generos ON discos.id_genero = generos.id WHERE " . $where;

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$genero]);
        $catalogo = $PDOStatement->fetchAll();

        // echo "<pre>";
        // print_r($catalogo);
        // echo "</pre>";

        return $catalogo;
    }

    /**
     * Devuelve los datos de un disco en particular 
     * @param int $idDisco El ID del disco
     * @return Disco Un objeto Disco o null
     */
    public function catalogo_por_id(int $idDisco): ?Disco{
        $catalogo = $this->catalogoCompleto();
        $conexion = (new Conexion())->getConexion();
        
        $query = "SELECT * FROM discos WHERE discos.id = ?";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$idDisco]);
        $catalogo = $PDOStatement->fetch();

        // echo "<pre>";
        // print_r($catalogo);
        // echo "</pre>";

        return $catalogo ?? null;
    }
    #endregion
}