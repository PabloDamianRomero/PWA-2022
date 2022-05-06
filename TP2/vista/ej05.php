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
    <div class="container shadow-lg">
        <div class="table-responsive">
            <table id="listaContacto" class="table table-success table-hover" style="width:100%">

                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Empresa</th>
                        <th>Telefono</th>
                        <th>Mail</th>
                        <th>Comentario</th>
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