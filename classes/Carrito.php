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
     * Actualiza las cantidades de los productos
     * @param array $cantidades Array asociativo con las cantidades de cada producto con su id 
     */
    public function update_quantities(array $cantidades){
        
       foreach ($cantidades as $key => $value) {
            if(isset($_SESSION['carrito'][$key])){
                $_SESSION['carrito'][$key]['cantidad'] = $value;
            }
        }
        
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

    /**
     * Devuelve el precio total
     * @return float $total Un flotante con el precio total
     */
    public function precio_total(): float{
        $total = 0;
        if(!empty($_SESSION['carrito'])){
            foreach ($_SESSION['carrito'] as $item) {
                $total += $item['precio'] * $item['cantidad'];
            }
        }
        return $total;
    }
    #endregion
}