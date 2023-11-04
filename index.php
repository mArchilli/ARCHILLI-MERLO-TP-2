<?PHP
require_once 'classes/Disco.php';

// Array asociativo de secciones validas
$secciones_validas = [
    "inicio" => [
        "titulo" => "Bienvenidos"
    ], 
    "envios" => [
        "titulo" => "Políticas de envío"
    ],
    "nosotros" => [
        "titulo" => "Sobre nosotros"
    ],
    "discos" => [
        "titulo" => "Nuestro catálogo"
    ],
    "producto" => [
        "titulo" => "Detalle de producto"
    ],
    "catalogo" => [
        "titulo" => "catálogo completo"
    ],
    "catalogo_x_genero" => [
        "titulo" => "catálogo por genero"
    ],
    "contacto" => [
        "titulo" => "Contacto"
    ],
    "procesar_datos_post" => [
        "titulo" => "Datos formulario"
    ]
];

// Verifica si el parámetro 'sec' está presente en la URL. Si está asigna su valor a la variable $seccion, de lo contrario, establece $seccion con el valor 'inicio'.
$seccion = isset($_GET['sec']) ? $_GET['sec'] : 'inicio';

// Verifica si la variable $seccion existe como una key en el array $secciones_validas.
if (!array_key_exists($seccion, $secciones_validas)) {
    // Si no existe
    $vista = "404";
    $titulo = "404: Página no encontradaA";
} else {
    // Si existe
    $vista = $seccion;
    // Asigna a $titulo el valor de "titulo" dentro del array
    $titulo = $secciones_validas[$seccion]['titulo'];
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RetroSound</title>

    <!-- bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- font Anton -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- font roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,700;1,500&display=swap" rel="stylesheet">


    <!-- estilos -->
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg nav-color px-2 py-3">
        <div class="container-fluid">
            <a class="navbar-brand d-flex gap-2" href="index.php?sec=inicio">
                <img src="img/disco-musica.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top"> 
                <h1 class="m-auto fs-4">RetroSound</h1>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse p-2" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?sec=inicio">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?sec=catalogo">Catálogo</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?sec=nosotros">Nosotros</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Épocas
                        </a>

                        <ul class="dropdown-menu nav-show">
                            <li><a class="dropdown-item" href="index.php?sec=discos&ep=los-80">Los 80'</a></li>
                            <li><a class="dropdown-item" href="index.php?sec=discos&ep=los-90">Los 90'</a></li>
                            <li><a class="dropdown-item" href="index.php?sec=discos&ep=los-2000">Los 2000</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Géneros
                        </a>

                        <ul class="dropdown-menu nav-show">
                            <li><a class="dropdown-item" href="index.php?sec=catalogo_x_genero&gen=pop">Pop</a></li>
                            <li><a class="dropdown-item" href="index.php?sec=catalogo_x_genero&gen=rock">Rock</a></li>
                            <li><a class="dropdown-item" href="index.php?sec=catalogo_x_genero&gen=electrónica">Electrónica</a></li>
                            <li><a class="dropdown-item" href="index.php?sec=catalogo_x_genero&gen=hip-hop">Hip-Hop</a></li>
                            <li><a class="dropdown-item" href="index.php?sec=catalogo_x_genero&gen=jazz">Jazz</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?sec=contacto">Contacto</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?sec=envios">Envíos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- main -->
        <main class="container">
        <?PHP

        // Incluye el archivo de vista correspondiente al valor de la variable $vista.
        require_once "views/$vista.php";

        ?>
        </main>

    <!-- footer -->
    <!-- <footer class="bg-secondary text-light text-center p-2">
        

    </footer> -->

    <footer class="footerDatos">
        <!-- Grid container -->
        <div class="container perfil">
            <!--Grid row-->
            <div class="row text-center py-5 px-2 p-lg-5 justify-content-center gap-3 m-auto">
            <!--Grid column-->
            <div class="col-12 col-md-5 py-lg-2">
                <ul class="list-group">
                    <li class="list-group-item perfil"><span class="text-uppercase">Archilli Matias</span></li>
                    <li class="list-group-item"><img src="img/perfil-archilli.png" class="img-fluid" alt="Alumno Archilli Matias"></li>
                    <li class="list-group-item">DNI: 42.536.278</li>
                    <li class="list-group-item">Correo: matias.archilli@davinci.edu.ar</li>
                    <li class="list-group-item">Edad: 23 años</li>
                </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-5 col-12 py-lg-2">
                <ul class="list-group">
                    <li class="list-group-item perfil"><span class="text-uppercase">Merlo Natalia</span></li>
                    <li class="list-group-item"><img src="img/perfil-merlo.png" class="img-fluid" alt="Alumna Merlo Natalia"></li>
                    <li class="list-group-item">DNI: 38.892.597</li>
                    <li class="list-group-item">Correo: natalia.merlo@davinci.edu.ar</li>
                    <li class="list-group-item">Edad: 28 años</li>
                </ul>
            </div>
            <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-4 copy">
            <p>© 2023 - Programacion II - DWN3CV</p>
        </div>
        <!-- Copyright -->
    </footer>

    <!-- boostrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>