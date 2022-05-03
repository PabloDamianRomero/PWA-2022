<?php
$titulo = "Ejercicio 03 - Tp02";
include_once "../estructura/cabecera.php";
?>

<!-- contenido de la página -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 text-center primer-titulo-pagina">
            <h1>Ejercicio 3 - Modal descriptivo (Jquery/AJAX)</h1>
        </div>
    </div>
</div>

<section class="contenido-central contenido_ej3">
    <div class="container">
        <!-- fila con encabezado -->
        <div class="row border fondo-subtitulo-cuadro">
            <h4 class="text-center text-muted pt-2">Beneficios según la actividad física aplicada</h4>
        </div>
        
        <!-- fila con descripción -->
        <div class="row border fondo-parrafo-cuadro">
            <div class="col-lg-12 text-center">
                <p>
                    La actividad física es esencial para el mantenimiento y mejora de la salud y la prevención de las enfermedades, para todas las personas y a cualquier edad. La actividad física contribuye a la prolongación de la vida y a mejorar su calidad, a través de beneficios fisiológicos, psicológicos y sociales, que han sido avalados por investigaciones científicas.
                </p>
            </div>
        </div>
        
        <!-- fila imágenes en miniatura -->
        <div class="row">
            <div class="col img-miniaturas">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <img src="../../TP1/img_tp1/small/min_yoga.jpg" alt="imagen de yoga">
                    </li>
                    <li class="nav-item">
                        <img src="../../TP1/img_tp1/small/min_bici.jpg" alt="Img de bici">
                    </li>
                    <li class="nav-item">
                        <img src="../../TP1/img_tp1/small/min_correr.jpg" alt="Correr">
                    </li>
                    <li class="nav-item">
                        <img src="../../TP1/img_tp1/small/min_natacion.jpg" alt="imagen de natacion">
                    </li>
                    <li class="nav-item">
                        <img src="../../TP1/img_tp1/small/min_abdominales.jpg" alt="imagen de abdominales">
                    </li>
                    <li class="nav-item">
                        <img src="../../TP1/img_tp1/small/min_bailar.jpg" alt="imagen de bailar">
                    </li>
                    <li class="nav-item">
                        <img src="../../TP1/img_tp1/small/min_caminar.jpg" alt="imagen de caminar">
                    </li>
                    <li class="nav-item">
                        <img src="../../TP1/img_tp1/small/min_cuerda.jpg" alt="imagen de cuerda">
                    </li>
                    <li class="nav-item">
                        <img src="../../TP1/img_tp1/small/min_canotaje.jpg" alt="imagen de canotaje">
                    </li>
                    <li class="nav-item">
                        <img src="../../TP1/img_tp1/small/min_patinar.jpg" alt="imagen de patinar">
                    </li>
                    <li class="nav-item">
                        <img src="../../TP1/img_tp1/small/min_sentadilla.jpg" alt="imagen de sentadillas">
                    </li>
                    <li class="nav-item">
                        <img src="../../TP1/img_tp1/small/min_pilates.jpg" alt="imagen de pilates">
                    </li>
                </ul>
            </div>
        </div> <!-- fin fila imágenes en miniatura -->
        
        <div class="row">
            <!-- columna con lista (enlaces) -->
            <div class="col-sm-4 border fondo-lista-cuadro">
                <div class="navbar navbar-expand-sm navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav flex-column align-items-center m-auto lista_enlaces text-center">
                            <li class="nav-item">
                                <a class="nav-link modal-button" data-title="Hacer yoga" href="modal/yoga.html">Yoga</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link modal-button" data-title="Andar en bicicleta" href="modal/bicicleta.html">Bicicleta</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link modal-button" data-title="Correr" href="modal/correr.html">Correr</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link modal-button" data-title="Hacer natación" href="modal/natacion.html">Natación</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link modal-button" data-title="Hacer abdominales" href="modal/abs.html">Abdominales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link modal-button" data-title="Bailar" href="modal/bailar.html">Bailar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link modal-button" data-title="Salir a caminar" href="modal/caminar.html">Caminar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link modal-button" data-title="Saltar la soga" href="modal/soga.html">Saltar la soga</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link modal-button" data-title="Realizar canotaje" href="modal/canotaje.html">Canotaje</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link modal-button" data-title="Patinar" href="modal/patinar.html">Patinar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link modal-button" data-title="Realizar sentadillas" href="modal/sentadilla.html">Sentadillas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link modal-button" data-title="Hacer pilates" href="modal/pilates.html">Pilates</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> <!-- cierre de columna lista (enlaces)-->
            
            <!-- columna con imagen grande -->
            <div class="col-sm-8 border fondo-img-grande border border-primary">
                <div class="text-center img-grande">
                    <!-- <img class="img-fluid" src="#" alt="#"> -->
                </div>
            </div><!-- cierre de columna con imagen grande -->
        </div><!-- cierre de fila con 2 columnas (lista/img) -->
    </div><!-- cierre container -->
</section>

<!-- Universal Modal-->
<div class="modal" tabindex="-1" id="universal_modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">
            <div class="modal-header py-1 px-2">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- ... -->
            </div>
        </div>
    </div>
</div><!-- Universal Modal-->

<!-- Fin contenido de la página -->

<?php
include_once "../estructura/pie.php";
?>