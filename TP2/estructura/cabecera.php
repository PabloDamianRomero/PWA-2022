<?php
include_once "../configuracion.php";
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../bootstrap-5.1.3-dist/css/bootstrap.min.css">
   
    <!-- css jquery ui -->
    <link rel="stylesheet" href="../js/jquery-ui.css">
    <link rel="stylesheet" href="../js/jquery-ui.min.css">

    <!-- Iconos fontawesome (CDN)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css de datatables.net -->
    <!-- <link rel="stylesheet" href="../../style/datable.css"> -->
    <!-- <link rel="stylesheet" href="../util/DataTables-1.11.5/css/jquery.dataTables.min.css"> -->
    <link rel="stylesheet" href="../util/DataTables-1.11.5/css/dataTables.bootstrap5.min.css">

    <!-- fuente ubuntu -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <!-- Estilos propios -->
    <link rel="stylesheet" href="../../style/gral.css">
    <style>
        body{
            font-family: 'Ubuntu', sans-serif;
        }

        h2 {
            color: #00000085;
            font-size: 1.2rem;
        }

        .contenido_ej1 select#lista_act {
                width: 50%;
                margin: 0 auto;
                box-shadow: 0px 0px 2px #000000e3;
            }

        .contenido_ej1 select#lista_ben {
            width: 50%;
            margin: 0 auto;
            box-shadow: 0px 0px 2px #000000e3;
        }

        /* media query (ej1) */
        /* PANTALLA (menor-igual a 767px)*/
        @media (max-width: 767px) {
            .contenido_ej1 .enc_ben {
                margin-top: 30px;
            }
        }

        /* estilos para elemento activo en tabs dinámicos (ej2) */

        .contenido_ej2 .nav-tabs .nav-link:focus, .nav-tabs .nav-link:hover {
            border-color: #00000000;
        }

        .contenido_ej2 li.nav-item {
            background-color: #46464633;
            border-top-left-radius: 15px;
            border-top-right-radius: 8px;
        }

        .contenido_ej2 li.nav-item a {
            color: #fff;
        }

        .contenido_ej2 li.nav-item a:hover {
            color: yellow;
        }

        .contenido_ej2 li.on{
            background-color: #fff;
            border-top-left-radius: 15px;
            border-top-right-radius: 8px;
            border: 1px solid #bfaa08;
        }

        .contenido_ej2 li.on a{
            color: #000;
            font-weight: 500;
        }

        .contenido_ej2 li.on a:visited{
            color: #000;
        }

        .contenido_ej2 .tab-pane li{
            margin-top: 5px;
        }

        .contenido_ej2 .tab-content>.tab-pane {
            display: initial;
        }

        /* ejercicio 3 */
        .contenido_ej3 ul.nav.flex-column.align-items-center.m-auto.lista_enlaces {
            width: 100%;
        }

        .contenido_ej3 .lista_enlaces li.nav-item {
            width: inherit;
        }

        .contenido_ej3 .img-miniaturas li.nav-item {
            margin: 3px 5px;
        }

        .contenido_ej3 .lista_enlaces .nav-link:focus, .nav-link:hover {
            color: #0043ff;
            background-color: #b7b7b76b;
        }

        /* ejercicio 4 */

        #form_ej4_tp2{
            background-color: #fff;
            box-shadow: 0px 0px 5px #0000004d;
        }

        #form_ej4_tp2 input{
            background-color: #0000000f;
        }

        #form_ej4_tp2 textarea{
            background-color: #0000000f;
        }

        /* media query (ej4) */
        /* PANTALLA (menor-igual a 767px)*/
        @media (max-width: 767px) {
            #form_ej4_tp2{
                width: 100%!important;
            }

            #col_empresa{
                margin-top: 24px;
            }
        }

        
    </style>

    <title><?php echo $titulo ?></title>
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- clases para posicionar el footer al final de la pantalla -->
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="../../index.html"><i class="fa fa-home" aria-hidden="true"></i></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- enlaces menú -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item bg-warning text-wrap">
                            <a class="nav-link text-center" href="https://github.com/PabloDamianRomero/PWA-2022/blob/main/style/img/grupo_amarillo.png?raw=true" target="_blank">Grupo Amarillo</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    TP-Bootstrap
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="../../TP1/ej01.html">Ejercicio 01</a></li>
                                    <li><a class="dropdown-item" href="../../TP1/ej02.html">Ejercicio 02</a></li>
                                    <li><a class="dropdown-item" href="../../TP1/ej03.html">Ejercicio 03</a></li>
                                    <li><a class="dropdown-item" href="../../TP1/ej04.html">Ejercicio 04</a></li>
                                    <li><a class="dropdown-item" href="../../TP1/ej05.html">Ejercicio 05</a></li>
                                    <li><a class="dropdown-item" href="../../TP1/ej06.html">Ejercicio 06</a></li>
                                    <li><a class="dropdown-item" href="../../TP1/ej07.html">Ejercicio 07</a></li>
                                    <li><a class="dropdown-item" href="../../TP1/ej08.html">Ejercicio 08</a></li>
                                    <li><a class="dropdown-item" href="../../TP1/ej09.html">Ejercicio 09</a></li>
                                    <li><a class="dropdown-item" href="../../TP1/ej10.html">Ejercicio 10</a></li>
                                    <li><a class="dropdown-item" href="../../TP1/ej11.html">Ejercicio 11</a></li>
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
                                <li><a class="dropdown-item" href="../vista/ej01.php">Ejercicio 01</a></li>
                                <li><a class="dropdown-item" href="../vista/ej02.php">Ejercicio 02</a></li>
                                <li><a class="dropdown-item" href="../vista/ej03.php">Ejercicio 03</a></li>
                                <li><a class="dropdown-item" href="../vista/ej04.php">Ejercicio 04</a></li>
                                <li><a class="dropdown-item" href="../vista/ej05.php">Ejercicio 05</a></li>
                                <li><a class="dropdown-item" href="../vista/ej06.php">Ejercicio 06</a></li>
                              </ul>
                            </div>
                          </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar -->
    </header>