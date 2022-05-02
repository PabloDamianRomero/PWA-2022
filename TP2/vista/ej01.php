<?php
$titulo = "Ejercicio 01 - Tp02";
include_once "../estructura/cabecera.php";
?>

<!-- contenido de la página -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 text-center primer-titulo-pagina">
            <h1>Ejercicio 1 - Combo Select dinámico (Jquery/AJAX)</h1>
        </div>
    </div>
</div>


<div class="container mt-5">
    <div class="card pt-4 pb-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h2 class="text-center mb-4">Actividad</h2>
                <select class="form-select" id="lista_act">
                    <!-- ... -->
                </select>
            </div>
            
            <div class="col-md-4">
                <h2 class="text-center mb-4">Beneficio/s</h2>
                <select class="form-select" id="lista_ben">
                    <!-- ... -->
                </select>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="alert alert-success d-flex text-center border border-2 border-dark" role="alert">
                    <p id="resultado_combo"></p>
                </div>
            </div>
        </div>
    </div>
<!-- Fin contenido de la página -->

<?php
include_once "../estructura/pie.php";
?>