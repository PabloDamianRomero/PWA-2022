<?php
$titulo = "Ejercicio 02 - Tp02";
include_once "../estructura/cabecera.php";
?>

<!-- contenido de la página -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 text-center primer-titulo-pagina">
            <h1>Ejercicio 2 - Tabs dinámicos (Jquery/AJAX)</h1>
        </div>
    </div>
</div>


<!-- tabs dinámincas -->
<section class="contenido-central contenido_ej2">
    <div class="container">
        <h3 class="text-center mt-5">Qué hacer antes y después del ejercicio</h3>
        
        <div class="row justify-content-center">
            <div class="col-sm-8 ">
                <ul class="nav nav-tabs mt-3" id="tabs_dinamicas">
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#opcion1">Antes de empezar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#opcion2">Al terminar</a>
                    </li>
                </ul>
                
                <div class="tab-content" id="content_wrapper">
                    <div class="tab-pane" id="content">
                        <!-- ... -->
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>

<!-- Fin contenido de la página -->

<?php
include_once "../estructura/pie.php";
?>