<?PHP
class Disco {
    private $id;
    private $epoca;
    private $disco;
    private $artista;
    private $publicacion;
    private $genero;
    private $sello;
    private $portada;
    private $precio;
    private $descripcion;

    /**
     * Devuelve el catalogo de discos completo
     * @return array Un array de objetos Disco
     */
    public function catalogoCompleto():array{
        $catalogo = [];

        $JSON = file_get_contents('datos/productos.json');
        $JSONData = json_decode($JSON);

        foreach ($JSONData as $value) {
            
            $disco = new Self();

            $disco->id = $value->id;
            $disco->epoca = $value->epoca;
            $disco->disco = $value->disco;
            $disco->artista = $value->artista;
            $disco->publicacion = $value->publicacion;
            $disco->genero = $value->genero;
            $disco->sello = $value->sello;
            $disco->portada = $value->portada;
            $disco->precio = $value->precio;
            $disco->descripcion = $value->descripcion;

            $catalogo[] = $disco;
        }

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
     * Get the value of epoca
     */
    public function getEpoca()
    {
        return $this->epoca;
    }

    /**
     * Get the value of disco
     */
    public function getDisco()
    {
        return $this->disco;
    }

    /**
     * Get the value of artista
     */
    public function getArtista()
    {
        return $this->artista;
    }

    /**
     * Get the value of publicacion
     */
    public function getPublicacion()
    {
        return $this->publicacion;
    }

    /**
     * Get the value of genero
     */
    public function getGenero()
    {
        return $this->genero;
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


}