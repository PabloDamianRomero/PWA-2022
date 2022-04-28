<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">

    <!-- Iconos fontawesome (CDN)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Estilos propios -->
    <link rel="stylesheet" href="../style/gral.css">

    <title><?php echo $titulo?></title>
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- clases para posicionar el footer al final de la pantalla -->
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.html"><i class="fa fa-home" aria-hidden="true"></i></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- enlaces menú -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    TP-Bootstrap
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="../TP1/ej01.html">Ejercicio 01</a></li>
                                    <li><a class="dropdown-item" href="../TP1/ej02.html">Ejercicio 02</a></li>
                                    <li><a class="dropdown-item" href="../TP1/ej03.html">Ejercicio 03</a></li>
                                    <li><a class="dropdown-item" href="../TP1/ej04.html">Ejercicio 04</a></li>
                                    <li><a class="dropdown-item" href="../TP1/ej05.html">Ejercicio 05</a></li>
                                    <li><a class="dropdown-item" href="../TP1/ej06.html">Ejercicio 06</a></li>
                                    <li><a class="dropdown-item" href="../TP1/ej07.html">Ejercicio 07</a></li>
                                    <li><a class="dropdown-item" href="../TP1/ej08.html">Ejercicio 08</a></li>
                                    <li><a class="dropdown-item" href="../TP1/ej09.html">Ejercicio 09</a></li>
                                    <li><a class="dropdown-item" href="../TP1/ej10.html">Ejercicio 10</a></li>
                                    <li><a class="dropdown-item" href="../TP1/ej11.html">Ejercicio 11</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                              <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                TP-AJAX
                              </button>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="ej01.php">Ejercicio 01</a></li>
                                <li><a class="dropdown-item" href="ej02.php">Ejercicio 02</a></li>
                              </ul>
                            </div>
                          </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Ingrese término"
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Navbar -->
    </header>