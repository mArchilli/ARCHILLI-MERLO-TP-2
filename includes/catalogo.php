<?PHP

/**
 * Devuelve el catálgo completo
 * @return array - Un array con el catálogo completo de productos en stock
 */
function catalogo_completo(): array
{

    $catalogoJSON = file_get_contents('datos/productos.json');
    $catalogo = json_decode($catalogoJSON, TRUE);

    return $catalogo;
}


/**
 * Devuelve el catalogo de productos de una época en particular
 * @param string $ Un string con el nombre de la epoca a buscar
 * 
 * @return array Un array con todos los dicos de esa epoca que tenemos en stock.
 */
function catalogo_x_epoca(string $epocaSeleccionada): array
{
    $resultado = [];

    $catalogo = catalogo_completo();

    foreach ($catalogo as $c) {
        
        if ($c['epoca'] == $epocaSeleccionada) {
            $resultado[] = $c;
        }
    }

    return $resultado;
}

/**
 * Devuelve los datos de un producto en particular
 * @param int $idProducto El ID único del producto a mostrar 
 * 
 * @return array Un array con los datos del producto encontrado O null en caso que no se encuentre niguno.
 */
function producto_x_id(int $idProducto): array
{
    $disco = [];

    $catalogo = catalogo_completo();

    foreach ($catalogo as $c) {
        if ($c['id'] == $idProducto) {
            $disco = $c;
        }
    }

    return $disco;
}


