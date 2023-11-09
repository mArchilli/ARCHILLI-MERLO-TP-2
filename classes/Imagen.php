<?php

class Imagen{

    /**
     * Devuelve Un string con el nombre del archivo 
     * @return string Un string con el nombre del archivo 
     */
    public function subirImagen($directorio, $datosArchivo): string{
        $archivo_original = explode('.', $datosArchivo['name']);
        $extension = end($archivo_original);
        $nombreArchivo = time() . ".$extension";
        $fileUpload = move_uploaded_file($datosArchivo['tmp_name'], "$directorio/$nombreArchivo");

        if($fileUpload){
            return $nombreArchivo;
        }else{
            throw New Exception("No se pudo cargar la imagen al artista");
        }
    }

    /**
     * Devuelve Un string con el nombre del archivo 
     * @return bool Un booleano con TRUE en caso de eliminarse, FALSE en caso de error al eliminar 
     */
    public function eliminarImagen($archivo): bool{
        if(file_exists($archivo)){

            $file_delete = unlink($archivo);

            if (!$file_delete) {
                throw new Exception("No se pudo subir la imagen");
            } else {
                return TRUE;   
            }

        } else {

            return FALSE;

        }
    }
}