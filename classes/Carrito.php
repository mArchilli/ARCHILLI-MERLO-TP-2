<?PHP 

Class Carrito{
    

    #region METODOS
    /**
     * Agrega un item al carrito 
     * @param int $discoID El ID del disco
     * @param int $cantidad La cantidad de unidades de ese producto
     */
    public function add_item(int $discoID, int $cantidad){
        $itemData = (new Disco())->catalogo_por_id($discoID);

        if($itemData){
            $_SESSION['carrito'][$discoID] = [
                'titulo' => $itemData->getTitulo(),
                'portada'=> $itemData->getPortada(),
                'precio'=> $itemData->getPrecio(),
                'cantidad'=> $cantidad,
            ];
        }
    }

    /**
     * Elimina un item del carrito 
     * @param int $discoID El ID del disco
     */
    public function remove_item(int $discoID){

        if(isset($_SESSION['carrito'][$discoID])){
            unset($_SESSION['carrito'][$discoID]);
        }
    }

    /**
     * Vacia el carrito 
     */
    public function clear_items(){
        
        $_SESSION['carrito'] = [];
        
    }

    /**
     * Devuelve los items del carrito
     * @return array $carrito Un array con los items del carrito
     */
    public function get_carrito(): array{
        if(!empty($_SESSION['carrito'])){
            return $_SESSION['carrito'];
        }else{
            return [];
        }
    }
    #endregion
}