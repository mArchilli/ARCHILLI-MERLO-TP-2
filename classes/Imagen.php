<?php

class Imagen{
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
}