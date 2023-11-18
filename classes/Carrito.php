<?PHP 

Class Carrito{
    

    /**
     * Agrega un item al carrito 
     * @param int $discoID El ID del disco
     * @param int $cantidad La cantidad de unidades de ese producto
     */
    public function add_item(int $discoID, int $cantidad){
        $itemData = (new Disco())->catalogo_por_id($discoID);

        if($itemData){
            $_SESSION['carrito'][$discoID] = 23;
        }
    }
}