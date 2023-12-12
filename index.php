<?PHP
require_once 'function/autoload.php';

$generos = (new Genero())->listar_generosPrincipales();


// Array asociativo de secciones validas
$secciones_validas = [
    "inicio" => [
        "titulo" => "Bienvenidos",
        "restringido" => FALSE
    ], 
    "envios" => [
        "titulo" => "Políticas de envío",
        "restringido" => FALSE
    ],
    "nosotros" => [
        "titulo" => "Sobre nosotros",
        "restringido" => FALSE
    ],
    "producto" => [
        "titulo" => "Detalle de producto",
        "restringido" => FALSE
    ],
    "catalogo" => [
        "titulo" => "catálogo completo",
        "restringido" => FALSE
    ],
    "catalogo_busqueda" => [
        "titulo" => "Catalogo de la busqueda",
        "restringido" => FALSE
    ],
    "catalogo_x_genero" => [
        "titulo" => "catálogo por genero",
        "restringido" => FALSE
    ],
    "catalogo_x_epoca" => [
        "titulo" => "catálogo por epoca",
        "restringido" => FALSE
    ],
    "catalogo_x_precio" => [
        "titulo" => "catálogo por precio",
        "restringido" => FALSE
    ],
    "contacto" => [
        "titulo" => "Contacto",
        "restringido" => FALSE
    ],
    "procesar_datos_post" => [
        "titulo" => "Datos formulario",
        "restringido" => FALSE
    ],
    "carrito" => [
        "titulo" => "Carrito de compras",
        "restringido" => FALSE
    ],
    "login" => [
        "titulo" => "Inicio de sesion",
        "restringido" => FALSE
    ],
    "panel_usuario" => [
        "titulo" => "Panel de Usuario",
        "restringido" => TRUE
    ],
    "finalizar_pago" => [
        "titulo" => "Finaliza pago",
        "restringido" => TRUE
    ]
];

// Verifica si el parámetro 'sec' está presente en la URL. Si está asigna su valor a la variable $seccion, de lo contrario, establece $seccion con el valor 'inicio'.
$seccion = isset($_GET['sec']) ? $_GET['sec'] : 'inicio';

// Verifica si la variable $seccion existe como una key en el array $secciones_validas.
if (!array_key_exists($seccion, $secciones_validas)) {
    // Si no existe
    $vista = "404";
    $titulo = "404: Página no encontrada";
} else {
    // Si existe
    $vista = $seccion;

    if($secciones_validas[$seccion]['restringido']){
        (new Autenticacion())->verify(FALSE);
    } 

    
    // Asigna a $titulo el valor de "titulo" dentro del array
    $titulo = $secciones_validas[$seccion]['titulo'];
}

$userData = $_SESSION['loggedIn'] ?? FALSE;

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
<body class="body-index">

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

                <ul class="navbar-nav me-auto ">

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?sec=nosotros">Nosotros</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?sec=envios">Envíos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?sec=contacto">Contacto</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto ">

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?sec=catalogo">Catalogo</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Épocas
                        </a>

                        <ul class="dropdown-menu nav-show">
                            <li><a class="dropdown-item" href="index.php?sec=catalogo_x_epoca&ep=1980">Los 80'</a></li>
                            <li><a class="dropdown-item" href="index.php?sec=catalogo_x_epoca&ep=1990">Los 90'</a></li>
                            <li><a class="dropdown-item" href="index.php?sec=catalogo_x_epoca&ep=2000">Los 2000</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Géneros
                        </a>

                        <ul class="dropdown-menu nav-show">
                            <?PHP foreach ($generos as $genero){?>
                            <li><a class="dropdown-item" href="index.php?sec=catalogo_x_genero&gen=<?=strtolower($genero['nombre'])?>"><?= $genero['nombre'] ?></a></li>
                            <?PHP }?>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Precio
                        </a>

                        <ul class="dropdown-menu nav-show">
                            <li><a class="dropdown-item" href="index.php?sec=catalogo_x_precio&hasta=1700">Hasta $ 1.700</a></li>
                            <li><a class="dropdown-item" href="index.php?sec=catalogo_x_precio&hasta=2000">Hasta $ 2.000</a></li>
                            <li><a class="dropdown-item" href="index.php?sec=catalogo_x_precio&hasta=2500">Hasta $ 2.500</a></li>
                        </ul>
                    </li>

                    <li class="nav-item mb-2 mb-lg-0">
                        <form action="index.php?sec=catalogo_busqueda" method="post" class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar" name='termino'>
                            <button class="btn btn-style" type="submit">Buscar</button>
                        </form>
                    </li>

                    <li class="nav-item mb-2 mb-lg-0">
                        <a class="nav-link active py-0" href="index.php?sec=carrito" data-bs-toggle="tooltip" data-bs-placement="top" title="Carrito" >
                        <button class="btn btn-style w-100">🛒</button>
                        </a>
                    </li>

                    <li class="nav-item mb-2 mb-lg-0">
                        <a class="nav-link active py-0 px-0" href="admin">
                            <button class="btn btn-info w-100">Admin</button>
                        </a>
                    </li>

                    <li class="nav-item mb-2 mb-lg-0">
                        <a class="nav-link active py-0 <?= $userData ? "" : "d-none" ?>" href="admin/actions/auth_logout.php">
                        <button class="btn btn-danger w-100">Logout: <span class="fw-light"><?= $userData['nombre_usuario'] ?? "" ?></span></button>
                        </a>
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

    <footer class="footerDatos">
        <!-- Grid container -->
        <div class="container perfil">
            <!--Grid row-->
            <div class="row text-center py-5 px-2 p-lg-5 justify-content-center gap-3 m-auto">
            <!--Grid column-->
            <div class="col-12 col-md-5 py-lg-2">
                <ul class="list-group">
                    
                    <li class="list-group-item" >
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed d-flex flex-column" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <li><span class="text-uppercase">Archilli Matias</span></li>
                            </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse m-3" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <img src="img/perfil-archilli.png" class="img-fluid" alt="Alumno Archilli Matias">
                            </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">DNI: 42.536.278</li>
                    <li class="list-group-item">Correo: matias.archilli@davinci.edu.ar</li>
                    <li class="list-group-item">Edad: 23 años</li>
                </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-5 col-12 py-lg-2">
            <ul class="list-group">
                    <li class="list-group-item" >
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed d-flex flex-column" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <li><span class="text-uppercase">Merlo Natalia</span></li>
                            </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse m-3" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <img src="img/perfil-merlo.png" class="img-fluid" alt="Alumna Natalia Merlo">
                            </div>
                            </div>
                        </div>
                    </li>
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