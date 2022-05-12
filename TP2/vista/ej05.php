<?php
$titulo = "Ejercicio 05 - Tp02";
include_once "../estructura/cabecera.php";
?>

<!-- contenido de la página -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 text-center primer-titulo-pagina">
            <h1>Ejercicio 5 - Tabla paginada (Jquery/AJAX)</h1>


        </div>
    </div>
</div>



<section class="contenido-central contenido_ej5">
    <!-- ... -->
    <div class="container shadow-lg p-2" style="background-color: #cde3f4;">
        <div class="table-responsive">
            <table id="listaContacto" class="table table-light table-hover" style="width:100%">

                <thead> 
                    <tr class="text-light">
                        <th class="bg-secondary">Id</th>
                        <th class="bg-secondary">Nombre</th>
                        <th class="bg-secondary">Empresa</th>
                        <th class="bg-secondary">Teléfono</th>
                        <th class="bg-secondary">Mail</th>
                        <th class="bg-secondary">Comentario</th>
                    </tr>
                </thead>


            </table>
            <div class="col-md-12 text-center">


            </div>
        </div>
</section>

<!-- Fin contenido de la página -->

<?php
include_once "../estructura/pie.php";
?>