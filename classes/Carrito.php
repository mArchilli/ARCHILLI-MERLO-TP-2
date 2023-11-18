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
    #endregion
}