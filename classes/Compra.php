<?PHP

class Compra{

    /**
     * Devuelve las compras realizadas por un usuario 
     * @param int $idUsuario El ID del usuario
     * @return array Un array con las compras o null
     */
    public function compras_por_usuario(int $idUsuario): array{
        $conexion = conexion::getConexion();
        
        $query = "SELECT compras.id, compras.fecha, compras.importe, GROUP_CONCAT(CONCAT(item_x_compra.cantidad, 'x ', discos.titulo) SEPARATOR ', ') detalle FROM compras 
        JOIN item_x_compra ON compras.id = item_x_compra.compra_id 
        JOIN discos ON item_x_compra.item_id = discos.id 
        WHERE compras.id_usuario = ? 
        GROUP BY (compras.id);";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute([$idUsuario]);
        $compras = $PDOStatement->fetchAll();

        // echo "<pre>";
        // print_r($catalogo);
        // echo "</pre>";
        
        return $compras ?? [];
    }
}