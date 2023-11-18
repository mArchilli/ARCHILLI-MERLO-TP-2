<div class="row justify-content-center">
    <div class="col-12">
        <h2 class="text-center my-4">Carrito de compras</h2>
        <div class="container my-4"></div>

        <?PHP
        echo "<pre>";
        print_r($_SESSION['carrito'] ?? "");
        echo "</pre>";
        ?>
    </div>
</div>