<?php
$titulo = "Ejercicio 06 - Tp02";
include_once "../estructura/cabecera.php";
?>

<!-- contenido de la página -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 text-center primer-titulo-pagina">
            <h1>Ejercicio 6 - Formulario con sugerencias (Jquery/AJAX)</h1>
        </div>
    </div>
</div>



<section class="contenido-central contenido_ej6">
    <!-- ... -->
    <!-- Resultado del registro -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div id="resultadoRegistro" class="text-center">
                    <!-- ... -->
                </div>
            </div>
        </div>
    </div>

    <!-- Formulario de registro -->
    <div class="container">
        <form id="form_ej4_tp2" class="w-50 m-auto p-5">
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-outline">
                        <label class="form-label" for="Nombre">Nombre</label>
                        <input type="text" id="Nombre" class="form-control" maxlength="20"/>
                        <p id="NombreValidacion" class="text-danger"></p>
                    </div>
                </div>
                <div id="col_empresa" class="col-md-6">
                    <div class="form-outline">
                        <label class="form-label" for="Empresa">Empresa</label>
                        <input type="text" id="Empresa" class="form-control" maxlength="20"/>
                        <p id="EmpresaValidacion" class="text-danger"></p>
                    </div>
                </div>
            </div>
            
            <!-- Telefono input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="Telefono">Teléfono</label>
                <input type="text" id="Telefono" class="form-control" maxlength="10"/>
                <p id="TelefonoValidacion" class="text-danger"></p>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="Email">Email</label>
                <input type="email" id="Email" class="form-control" />
                <p id="EmailValidacion" class="text-danger"></p>
            </div>

            
            <div class="row">
                <!-- Selección de países -->
                <div class="form-outline mb-4 col-md-6">
                    <label class="form-label" for="Pais">Pais</label>
                    <select class="form-select" id="lista_pais">
                        <!-- ... -->
                    </select>
                </div>

                <!-- Estados/Provincias input -->
                <div class="form-outline mb-4 col-md-6">
                    <label class="form-label" for="Estado">Estado/Provincia</label>
                    <input type="text" id="Estado" class="form-control" maxlength="100"/>
                    <p id="EstadoValidacion" class="text-danger"></p>
                    <div id="rta" class="text-danger overflow-auto" style="height:100px;">
                        <!-- ... -->
                    </div>
                </div>
            </div>
            
            <!-- Comentarios -->
            <div class="form-outline mb-4">
                <label class="form-label" for="Comentario">Comentarios</label>
                <textarea class="form-control" id="Comentario" rows="4" maxlength="300"></textarea>
                <p id="ComentarioValidacion" class="text-danger"></p>
            </div>
            
            <!-- Botones -->
            <div class="row">
                <div class="col-md-6 mt-2">
                    <!-- Submit button -->
                    <button id="Enviar" type="button" class="btn btn-success btn-block w-100">Enviar</button>
                </div>
                <div class="col-md-6 mt-2">
                    <!-- Reset button -->
                    <button id="Borrar" type="reset" class="btn btn-outline-danger btn-block w-100">Borrar</button>
                </div>
            </div>
        </form>
    </div>
    <!-- ... -->
</section>

<!-- Fin contenido de la página -->

<?php
include_once "../estructura/pie.php";
?>