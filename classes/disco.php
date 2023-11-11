<?PHP


class Disco {

    #region ATRIBUTOS

    private $id;
    private $titulo;
    private $artista;
    private $genero;
    private $subgeneros;
    private $descripcion;
    private $sello;
    private $portada;
    private $publicacion;
    private $precio;
    private $fecha_carga;

    public static $createValues = ['id', 'titulo', 'descripcion', 'sello', 'portada', 'publicacion', 'precio', 'fecha_carga'];
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
        return $this->genero->getNombre();
    }

    /**
     * Get the value of subgeneros
     */ 
    public function getSubgeneros()
    {
        return $this->subgeneros;
    }

    /**
     * Get the value of artista
     */ 
    public function getArtista()
    {
        return $this->artista->getNombre();
    }

    
    #endregion

    #region METODOS

    /**
     * Devuelve el precio formateado 
     * @return string precio formateado
     */
    public function precio_formateado():string{
        return number_format($this->precio, 2, ",", ".");
    }

    /**
     * Crea la instancia de Disco configurado
     * @return Disco un Objeto de la clase Disco
     */    
    public function createDisco($discoData): Disco{
        $disco = new Self();

        // echo "<pre>";
        // print_r($discoData);
        // echo "</pre>";

        foreach (self::$createValues as $value) {
            $disco->{$value} = $discoData[$value];
        }

        $disco->artista = (new Artista())->get_x_id($discoData['id_artista']);
        $disco->genero = (new Genero())->get_x_id($discoData['id_genero']);

        $id_subgeneros = !empty($discoData['subgeneros']) ? explode(",", $discoData['subgeneros']) : [];
        $subgeneros = [];
        foreach ($id_subgeneros as $id_subgenero) {
            $subgeneros[] = (new Genero)->get_x_id(intval($id_subgenero));
        }
        $disco->subgeneros = $subgeneros;

        return $disco;
    }

    /**
     * Devuelve el catalogo de discos completo
     * @return Disco[] Un array de objetos Disco
     */
    public function catalogoCompleto():array{

        $conexion = conexion::getConexion();
        $query = "SELECT discos.*, GROUP_CONCAT(gxd.id_genero) AS subgeneros FROM discos
        LEFT JOIN generos_x_disco AS gxd ON discos.id = gxd.id_disco
        GROUP BY discos.id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();

        //  echo "<pre>";
        //  print_r($catalogo);
        //  echo "</pre>";

        while ($disco = $PDOStatement->fetch()){
            $catalogo[] = $this->createDisco($disco);
        }

        return $catalogo;
    }

    /**
     * Devuelve el catalogo de los discos publicados en una epoca en particular
     * @param string $fechaPublicacion Un string con el año de publicacion
     * @return Disco[] Un array de objetos Disco 
     */
    public function catalogo_por_epoca(string $epoca):array{

        $conexion = conexion::getConexion();

        //cláusula WHERE dinámica
        $where = '';
        switch ($epoca) {
            case '1980':
                $where = 'publicacion >= 1980 AND publicacion <= 1989 ';
                break;
            case '1990':
                $where = 'publicacion >= 1990 AND publicacion <= 1999 ';
                break;
            case '2000':
                $where = 'publicacion >= 2000 AND publicacion <= 2009 ';
                break;
            default:
                break;
        }

        
        $query = "SELECT discos.*, GROUP_CONCAT(gxd.id_genero) AS subgeneros FROM discos
        LEFT JOIN generos_x_disco AS gxd ON discos.id = gxd.id_disco WHERE " . $where . " GROUP BY discos.id;" ;
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();

        while ($disco = $PDOStatement->fetch()){
            $catalogo[] = $this->createDisco($disco);
        }
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
        $conexion = conexion::getConexion();

        $generos = (new Genero())->listar_generosPrincipales();
        $catalogo = [];
        
        foreach($generos as $generoBD) {
            if ($genero == strtolower($generoBD['nombre'])){

                // $query = "SELECT * FROM discos 
                // JOIN generos ON discos.id_genero = generos.id 
                
                // WHERE generos.nombre = ?";

                $query = "SELECT discos.*, GROUP_CONCAT(gxd.id_genero) AS subgeneros FROM discos
                LEFT JOIN generos_x_disco AS gxd ON discos.id = gxd.id_disco
                JOIN generos ON discos.id_genero = generos.id
                WHERE generos.nombre = ? 
                GROUP BY discos.id";

                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
                $PDOStatement->execute([$genero]);

                while ($disco = $PDOStatement->fetch()){
                    $catalogo[] = $this->createDisco($disco);
                }
            }
        }

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
        $conexion = conexion::getConexion();
        
        $query = "SELECT discos.*, GROUP_CONCAT(gxd.id_genero) AS subgeneros FROM discos
        LEFT JOIN generos_x_disco AS gxd ON discos.id = gxd.id_disco
        WHERE discos.id = ?
        GROUP BY discos.id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute([$idDisco]);
        $catalogo = $this->createDisco($PDOStatement->fetch());

        // echo "<pre>";
        // print_r($catalogo);
        // echo "</pre>";

        return $catalogo ?? null;
    }

    /**
     * Devuelve el catalogo de los discos por intervalos de precios
     * @param int $minimo Un int que trae el precio minimo
     * @param int $maximo Un int que trae el precio maximo
     * @return Disco[] Un array de objetos Disco 
     */
    public function catalogo_por_precio(int $minimo = 0, int $maximo = 0):array{

        $conexion = conexion::getConexion();

        if($maximo){
            $query = "SELECT * FROM discos WHERE precio BETWEEN :minimo AND :maximo";
        } else {
            $query = "SELECT * FROM discos WHEN precio > :minimo";
        }

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute(['minimo'=> $minimo,'maximo'=> $maximo]);

        while ($disco = $PDOStatement->fetch()){
            $catalogo[] = $this->createDisco($disco);
        }

        // echo "<pre>";
        // print_r($catalogo);
        // echo "</pre>";

        return $catalogo;
    }

    /**
     * Buscador de discos por termino
     * @param string $busqueda Un string que recibe el termino de busqueda
     * @return Disco[] Un array de objetos Disco 
     */
    public function buscador(string $busqueda): array{

        $conexion = conexion::getConexion();

        $query = "SELECT * FROM discos WHERE titulo LIKE :busqueda OR descripcion LIKE :busqueda";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute(['busqueda' => "%$busqueda%"]);

        while ($disco = $PDOStatement->fetch()){
            $catalogo[] = $this->createDisco($disco);
        }
        return $catalogo;
    }
<<<<<<< HEAD
    #endregion
=======
    
    /**
     * Devuelve los discos de determinado artista
     * @param int $idArtista El ID único del artista buscado 
     * 
     * @return Disco[] Un array de objetos Disco
     */
    public function disco_x_artista(int $idArtista): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM discos WHERE id_artista = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$idArtista]);

        $resultado = $PDOStatement->fetchAll();

        return $resultado ?? null;
    }

    #endregion
    
>>>>>>> 1c48c70a96f0b71e06c896263dc6e5b1e13cc975
}