<?PHP

$listaDeArtistas = (new Artista())->listado_artistas();


?>

<div class="row d-flex align-items-center gap-4 py-5 px-3">
    <div class="col-12">
        <h2 class="fs-1 my-4 fw-bold text-center">¡Bienvenidos al panel de Administracion de Artistas!</h2>
    </div>
    <div class="col-12">
        <?PHP 
          echo "<pre>";
          print_r($listaDeArtistas);
          echo "</pre>";
        ?>
    </div>
</div>
