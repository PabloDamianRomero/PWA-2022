// ------------------------------------------------------------------------------------------------------------------
// EJERCICIO 1 - Combo Select Dinámico

/**
 * -----------------
 *  OPCION 1 (JSON)
 * -----------------
 */

// CARGAR EL PRIMER SELECT (Actividades) AL CARGAR LA PÁGINA (CON Json)
$(document).ready(function () {
    $('#lista_act').html('');
    $('#lista_act').html('<option selected="selected" disabled="disabled">Elija Actividad</option>');
    $.ajax({
        type: 'POST',
        url: 'http://localhost/PWA-2022/TP2/control/actividades.json',
        success: function (data) {
            $.each(data, function (index, item) {
                $('#lista_act').html($('#lista_act').html() + '<option value="' + item.idActividad + '">' + item.nombreActividad + '</option>');
            });
        }
    });
});

/**
 * -----------------
 *  OPCION 2 (BASE DE DATOS)
 * -----------------
 */

// CARGAR EL PRIMER SELECT (Actividades) AL CARGAR LA PÁGINA (CON BASE DE DATOS -> TABLAS ACTIVIDAD y BENEFICIO)
// $(document).ready(function () {
//     $('#lista_act').html('');
//     $('#lista_act').html('<option selected="selected" disabled="disabled">Elija Actividad</option>');
//     $.ajax({
//         type: 'POST',
//         url: 'http://localhost/PWA-2022/TP2/vista/accion/listar_actividad.php',
//         success: function (data) {
//             $('#lista_act').html($('#lista_act').html() + data);
//         }
//     });
// });


/**
 * /////////////////////////////////////////////////////////////////////////////////////////////////////////
 */

/* Carga los beneficios al cambiar la actividad (CON Json)*/
$(function () {
    $('#lista_act').on('change', function () {
        var idAct = $('#lista_act').val();
        if (!$('#msj').hasClass('d-none')) {
            $('#msj').toggleClass('d-none');
        }
        $('#resultado_combo').html('');
        $('#lista_ben').html('<option selected="selected" disabled="disabled">Elija beneficio</option>');
        var beneficios = $.getJSON('http://localhost/PWA-2022/TP2/control/beneficios.json', function (data) {
            $.each(data, function (index, item) {
                if (item.idActividad == idAct) {
                    $('#lista_ben').html($('#lista_ben').html() + '<option value="' + item.idBeneficio + '">' + item.nombreBeneficio + '</option>');
                }
            });
        });
    });


    /* Carga los beneficios al cambiar la actividad (CON BASE DE DATOS -> TABLAS ACTIVIDAD y BENEFICIO)*/
    // $(function () {
    //     $('#lista_act').on('change', function () {
    //         if (!$('#msj').hasClass('d-none')) {
    //             $('#msj').toggleClass('d-none');
    //         }
    //         $('#resultado_combo').html('');
    //         var id = $('#lista_act').val();
    //         var url = 'http://localhost/pwa-2022/TP2/vista/accion/cargar_beneficio.php';
    //         $('#lista_ben').html('<option selected="selected" disabled="disabled">Elija beneficio</option>');
    //         $.ajax({
    //             type: 'POST',
    //             url: url,
    //             data: 'id=' + id,
    //             success: function (data) {
    //                 $('#lista_ben').html($('#lista_ben').html() + data);
    //             }
    //         });
    //     });


    /* Al cambiar/seleccionar beneficio, mostrar mensaje final  */
    $('#lista_ben').on('change', function () {
        $('#msj').removeClass('d-none');
        $('#resultado_combo').html('');
        $('#resultado_combo').html($('#resultado_combo').html() +
            'La actividad <strong>' + $("#lista_act option:selected").text() + '</strong>' +
            ' beneficia la/s: <strong>' + $("#lista_ben option:selected").text() + '</strong>');
    });
});

// ------------------------------------------------------------------------------------------------------------------


// ------------------------------------------------------------------------------------------------------------------
// EJERCICIO 2 - Tabs Dinámicos

$(function () {
    $('#tabs_dinamicas a').click(function (e) {
        $('#tabs_dinamicas li').removeClass('on'); // remueve la clase 'on' a todos los elementos 'li' dentro de clase 'tabs_dinamicas'
        $(this).parent('li').addClass('on'); // this = elemento 'a'. Añade al padre 'li' la clase 'on'
        var pagina = this.hash.substr(1); // Eliminar simbolo '#' de la cadena
        $.get(pagina + '.php', function (contenido) {
            $('#content').html(contenido);
        });
    });

    // La propiedad location.hash establece o devuelve la parte ancla de una URL, incluido el signo de almohadilla (#).
    if (location.hash) { // si existe la url de la pestaña
        $('a[href="' + location.hash + '"]').click(); // click sobre el tab actual de la url
    } else {
        $('#tabs_dinamicas a:first').click(); // click sobre el primer tab
    }
});

// ------------------------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------------------------
// EJERCICIO 3 - Modal Dinámico

$(function () {
    // Modal button accion al hacer click
    $('.modal-button').click(function (e) {
        e.preventDefault(); // Deshabilitar comportamiento por defecto al hacer click
        var $a_id = $(this).attr('id'); // atributo id tiene el formato 'content_src_*'
        $a_id = $a_id.substr(12); // elimino la parte 'content_src_'
        show_universal_modal($(this).attr('data-title'), $(this).attr('href'), $a_id);
    });
});

function show_universal_modal($title, $link, $id = '') {
    // Verifica si link es vacío, entonces devuelve false
    if ($link == '') {
        alert("El contenido del link es nulo");
        return false;
    }
    $('#universal_modal').find('.modal-body').html("<center>Cargando datos. Por favor aguarde ...</center>");
    $('#universal_modal').find('.modal-title').html($title);
    $('#universal_modal').modal('show');

    // Obtener contenido via Ajax
    $.ajax({
        url: $link,
        error: err => {
            $('#universal_modal').find('.modal-body').html("<div class='alert alert-danger'>Error al obtener contenido.</div>");
            // En caso de error
        },
        success: function (resp) {
            $('.modal-body').html('');
            $('.img-grande').html('');
            var container = $('<div class="container-fluid">');
            var bigImg = '<img class="img-fluid" src="../../style/img/actividad_fisica/big/' + $id + '.jpg" alt="' + $id + '">';
            container.html(resp);
            $('#universal_modal').find('.modal-body').html(container);
            $('.fondo-img-grande').find('.img-grande').html(bigImg);
        }
    });

    // Cargar tabla de la actividad física seleccionada
    var $tabla = 'modal/tabla_modal/' + $link.substr(6);
    $('.fondo-tabla').html('');
    // Obtener contenido via Ajax
    $.ajax({
        url: $tabla,
        error: err => {
            alert('Hubo un problema al cargar la tabla. ' + err)
        },
        success: function (resp) {
            $('.fondo-tabla').html(resp);
        }
    });

    // Cargar párrafo de la actividad física seleccionada
    $('.fondo-parrafo-final').html('');
    var $parrafo = 'modal/parrafo_modal/' + $link.substr(6);
    // Obtener contenido via Ajax
    $.ajax({
        url: $parrafo,
        error: err => {
            alert('Hubo un problema al cargar el párrafo. ' + err)
        },
        success: function (resp) {
            $('.fondo-parrafo-final').html(resp);
        }
    });
}

// ------------------------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------------------------
// EJERCICIO 4 - Formulario de registro

// Validar campo nombre en tiempo real
$(function () {
    $('#Nombre').val('') /* para que al recargar no queden los input con datos */
    $('#Nombre').bind("propertychange change keyup input paste", function () {
        var $campoNombre = $('#Nombre').val();
        var $mensajeValidacion = '';
        var $esNumero = false;
        var $i = 0;
        $('#NombreValidacion').html('');
        $('#Nombre').removeClass('border-danger');
        if ($campoNombre.length == 0) {
            $mensajeValidacion = 'Por favor, ingrese nombre.';
            $('#Nombre').addClass('border-danger');
            $('#NombreValidacion').html($mensajeValidacion);
        }
        if ($campoNombre.length > 20) {
            $mensajeValidacion = 'El nombre debe ser menor a 20 caracteres.';
            $('#Nombre').addClass('border-danger');
            $('#NombreValidacion').html($mensajeValidacion);
        }
        while (!$esNumero && $i < $campoNombre.length) {
            if (!isNaN($campoNombre[$i])) {
                $esNumero = true;
            }
            $i++;
        }
        if ($esNumero) {
            $mensajeValidacion = 'El nombre no puede contener números.';
            $('#Nombre').addClass('border-danger');
            $('#NombreValidacion').html($mensajeValidacion);
        }
    });
});

// validar empresa en tiempo real
$(function () {
    $('#Empresa').val('') /* para que al recargar no queden los input con datos */
    $('#Empresa').bind("propertychange change keyup input paste", function () {
        var $campoEmpresa = $('#Empresa').val();
        var $mensajeValidacion = '';
        $('#EmpresaValidacion').html('');
        $('#Empresa').removeClass('border-danger');
        if ($campoEmpresa.length == 0) {
            $mensajeValidacion = 'Por favor, ingrese nombre de la empresa.';
            $('#Empresa').addClass('border-danger');
            $('#EmpresaValidacion').html($mensajeValidacion);
        }
        if ($campoEmpresa.length > 20) {
            $mensajeValidacion = 'El nombre de la empresa debe ser menor a 20 caracteres.';
            $('#Empresa').addClass('border-danger');
            $('#EmpresaValidacion').html($mensajeValidacion);
        }
    });
});

// validar telefono en tiempo real
$(function () {
    $('#Telefono').val('') /* para que al recargar no queden los input con datos */
    $('#Telefono').bind("propertychange change keyup input paste", function () {
        var $campoTelefono = $('#Telefono').val();
        var $mensajeValidacion = '';
        var $expCelular = /^(?:(?:00)?549?)?0?(?:11|[2368]\d)(?:(?=\d{0,2}15)\d{2})??\d{8}$/;
        $('#TelefonoValidacion').html('');
        $('#Telefono').removeClass('border-danger');
        if ($campoTelefono.length == 0) {
            $mensajeValidacion = 'Por favor, ingrese un número de teléfono.<br> Ej: 2995305395.';
            $('#Telefono').addClass('border-danger');
            $('#TelefonoValidacion').html($mensajeValidacion);
        }
        if (!$expCelular.test($campoTelefono)) {
            $mensajeValidacion = 'El número ingresado no pertenece a un celular. <br> Ej: 2995305395.';
            $('#Telefono').addClass('border-danger');
            $('#TelefonoValidacion').html($mensajeValidacion);
        }
    });
});

// validar mail en tiempo real
$(function () {
    $('#Email').val('') /* para que al recargar no queden los input con datos */
    $('#Email').bind("propertychange change keyup input paste", function () {
        var $campoMail = $('#Email').val();
        var $mensajeValidacion = '';
        var $expCelular = /\S+@\S+\.\S+/;
        $('#EmailValidacion').html('');
        $('#Email').removeClass('border-danger');
        if ($campoMail.length == 0) {
            $mensajeValidacion = 'Por favor, ingrese un correo electrónico.';
            $('#Email').addClass('border-danger');
            $('#EmailValidacion').html($mensajeValidacion);
        }
        if (!$expCelular.test($campoMail)) {
            $mensajeValidacion = 'El correo electrónico no es válido. <br> Formato: mail@gmail.com';
            $('#Email').addClass('border-danger');
            $('#EmailValidacion').html($mensajeValidacion);
        }
    });
});

// validar comentario en tiempo real
$(function () {
    $('#Comentario').val('') /* para que al recargar no queden los input con datos */
    $('#Comentario').bind("propertychange change keyup input paste", function () {
        var $campoComentario = $('#Comentario').val();
        var $mensajeValidacion = '';
        $('#ComentarioValidacion').html('');
        $('#Comentario').removeClass('border-danger');
        if ($campoComentario.length == 0) {
            $mensajeValidacion = 'Por favor, ingrese un comentario.';
            $('#Comentario').addClass('border-danger');
            $('#ComentarioValidacion').html($mensajeValidacion);
        }
        if ($campoComentario.length > 300) {
            $mensajeValidacion = 'El comentario ha excedido los 300 caracteres.';
            $('#Comentario').addClass('border-danger');
            $('#ComentarioValidacion').html($mensajeValidacion);
        }
    });
});


// validar todo junto una vez (cuando se hace click en Enviar)
function validarDatos($campoNombre, $campoEmpresa, $campoTelefono, $campoMail, $campoComentario) {
    var $esValido = true;
    var $mensajeValidacion = '';
    var $esNumero = false;
    var $i = 0;
    $('#NombreValidacion').html('');
    $('#Nombre').removeClass('border-danger');
    $('#EmpresaValidacion').html('');
    $('#Empresa').removeClass('border-danger');
    $('#TelefonoValidacion').html('');
    $('#Telefono').removeClass('border-danger');
    $('#EmailValidacion').html('');
    $('#Email').removeClass('border-danger');
    $('#ComentarioValidacion').html('');
    $('#Comentario').removeClass('border-danger');

    // nombre
    if ($campoNombre.length == 0) {
        $mensajeValidacion = 'Por favor, ingrese nombre.';
        $('#Nombre').addClass('border-danger');
        $('#NombreValidacion').html($mensajeValidacion);
        $esValido = false;
    }
    if ($campoNombre.length > 20) {
        $mensajeValidacion = 'El nombre debe ser menor a 20 caracteres.';
        $('#Nombre').addClass('border-danger');
        $('#NombreValidacion').html($mensajeValidacion);
        $esValido = false;
    }
    while (!$esNumero && $i < $campoNombre.length) {
        if (!isNaN($campoNombre[$i])) {
            $esNumero = true;
        }
        $i++;
    }
    if ($esNumero) {
        $mensajeValidacion = 'El nombre no puede contener números.';
        $('#Nombre').addClass('border-danger');
        $('#NombreValidacion').html($mensajeValidacion);
    }

    // empresa
    if ($campoEmpresa.length == 0) {
        $mensajeValidacion = 'Por favor, ingrese nombre de la empresa.';
        $('#Empresa').addClass('border-danger');
        $('#EmpresaValidacion').html($mensajeValidacion);
        $esValido = false;
    }
    if ($campoEmpresa.length > 20) {
        $mensajeValidacion = 'El nombre de la empresa debe ser menor a 20 caracteres.';
        $('#Empresa').addClass('border-danger');
        $('#EmpresaValidacion').html($mensajeValidacion);
        $esValido = false;
    }

    // telefono
    var $expCelular = /^(?:(?:00)?549?)?0?(?:11|[2368]\d)(?:(?=\d{0,2}15)\d{2})??\d{8}$/;
    if ($campoTelefono.length == 0) {
        $mensajeValidacion = 'Por favor, ingrese un número de teléfono. <br> Ej: 2995305395.';
        $('#Telefono').addClass('border-danger');
        $('#TelefonoValidacion').html($mensajeValidacion);
        $esValido = false;
    }
    if (!$expCelular.test($campoTelefono)) {
        $mensajeValidacion = 'El número ingresado no pertenece a un celular. <br> Ej: 2995305395.';
        $('#Telefono').addClass('border-danger');
        $('#TelefonoValidacion').html($mensajeValidacion);
        $esValido = false;
    }

    // telefono
    var $expCelular = /\S+@\S+\.\S+/;
    if ($campoMail.length == 0) {
        $mensajeValidacion = 'Por favor, ingrese un correo electrónico.';
        $('#Email').addClass('border-danger');
        $('#EmailValidacion').html($mensajeValidacion);
        $esValido = false;
    }
    if (!$expCelular.test($campoMail)) {
        $mensajeValidacion = 'El correo electrónico no es válido. <br> Formato: mail@gmail.com';
        $('#Email').addClass('border-danger');
        $('#EmailValidacion').html($mensajeValidacion);
        $esValido = false;
    }

    // comentario
    if ($campoComentario.length == 0) {
        $mensajeValidacion = 'Por favor, ingrese un comentario.';
        $('#Comentario').addClass('border-danger');
        $('#ComentarioValidacion').html($mensajeValidacion);
        $esValido = false;
    }
    if ($campoComentario.length > 300) {
        $mensajeValidacion = 'El comentario ha excedido los 300 caracteres.';
        $('#Comentario').addClass('border-danger');
        $('#ComentarioValidacion').html($mensajeValidacion);
        $esValido = false;
    }
    return $esValido;
}

// Al hacer click en boton enviar, valida todos los campos y obtiene respuesta mediante ajax
$(function () {
    $('#Enviar').click(function () {
        var $campoNombre = document.getElementById('Nombre').value;
        var $campoEmpresa = document.getElementById('Empresa').value;
        var $campoTelefono = document.getElementById('Telefono').value;
        var $campoMail = document.getElementById('Email').value;
        var $campoComentario = document.getElementById('Comentario').value;

        if (!validarDatos($campoNombre, $campoEmpresa, $campoTelefono, $campoMail, $campoComentario)) {
            $('#resultadoRegistro').removeClass('alert alert-success');
            $('#resultadoRegistro').addClass('alert alert-danger');
            $('#resultadoRegistro').html('<p>Campos incompletos</p>');
        } else {
            var $ruta = 'Nombre=' + $campoNombre + '&Empresa=' + $campoEmpresa + '&Telefono=' + $campoTelefono + '&Mail=' + $campoMail + '&Comentario=' + $campoComentario;
            $('#resultadoRegistro').html('');
            $.ajax({
                url: 'http://localhost/pwa-2022/TP2/vista/accion/registrar_contacto.php',
                type: 'POST',
                data: $ruta,
            })
                .done(function (res) { // exito
                    $('#resultadoRegistro').removeClass('alert alert-danger');
                    $('#resultadoRegistro').addClass('alert alert-success');
                    $('#resultadoRegistro').html(res);

                })
                .fail(function () {
                    $('#resultadoRegistro').removeClass('alert alert-success');
                    $('#resultadoRegistro').addClass('alert alert-danger');
                    $('#resultadoRegistro').html('<p><strong>Error</strong>. No se pudo registrar el contacto</p>');
                });

        }
        irHaciaArriba();
    });
});

// resetear estilos de validacion
$(function () {
    $('#Borrar').click(function () {
        $('#NombreValidacion').html('');
        $('#Nombre').removeClass('border-danger');
        $('#EmpresaValidacion').html('');
        $('#Empresa').removeClass('border-danger');
        $('#TelefonoValidacion').html('');
        $('#Telefono').removeClass('border-danger');
        $('#EmailValidacion').html('');
        $('#Email').removeClass('border-danger');
        $('#ComentarioValidacion').html('');
        $('#Comentario').removeClass('border-danger');
        $('#resultadoRegistro').html('');
        $('#resultadoRegistro').removeClass('alert alert-danger');
        $('#resultadoRegistro').removeClass('alert alert-success');
        $('#sugerenciaProvincia').html('');
        $('#rta').html('');
    });
});


function irHaciaArriba() {
    var body = $("html, body");
    body.stop().animate({
        scrollTop: 0
    }, 900, 'swing', function () { });
}


// ------------------------------------------------------------------------------------------------------------------
// EJERCICIO 5 - Tabla de contactos con paginación (Usando DataTable)

$('th').addClass('text-center')
$(document).ready(function () {

    $('#listaContacto').DataTable({
        'ajax': {
            'url': '../vista/accion/listar_contactos.php',
            'dataSrc': ''

        },
        'columns': [{
            'data': 'idContacto'
        },
        {
            'data': 'Nombre'
        },
        {
            'data': 'Empresa'
        },
        {
            'data': 'Telefono'
        },
        {
            'data': 'Mail'
        },
        {
            'data': 'Comentario'
        },
        ],
        'pageLength': 5,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        },

    })
    $('#listaContacto_length').hide();
});

// ------------------------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------------------------
// EJERCICIO 6 - Sugerencias de estados/provincias

// CARGAR EL SELECT (Pais) AL CARGAR LA PÁGINA
$(document).ready(function () {
    $('#lista_pais').html('');
    $('#sugerenciaProvincia').html('');
    $('#rta').html('');
    $.ajax({
        type: 'POST',
        url: 'http://localhost/PWA-2022/TP2/vista/accion/listar_paises.php',
        success: function (data) {
            $('#lista_pais').html($('#lista_pais').html() + data);
        }
    });
});

// autocompletar con listas  input 
//--------------------------------
$(document).ready(function () {
    $('#Estado').val('')
    $('#Estado').keyup(function () {
        $('#sugerenciaProvincia').html('Seleccione con un clic');
        var id_pais = $('#lista_pais').val();
        var query = $(this).val();
        if (query != '') {
            $.ajax({
                type: "POST",
                url: "accion/listar_estados.php",
                data: { param: query, pais: id_pais },
                success: function (data) {
                    $('#rta').fadeIn();
                    $('#rta').html(data);
                }
            });
        }
        var string = $('#Estado').val()
        if (string.length == 0) {
            $('#Estado').val('');
            $('#sugerenciaProvincia').html('');
        }
    });
    $('#rta').on('click', 'li', function () {
        $('#Estado').val($(this).text());
        $('#rta').fadeOut();
        $('#sugerenciaProvincia').html('');
    });
    $('#lista_pais').on('change', function () {
        $('#rta').html('');
        $('#sugerenciaProvincia').html('');
        $('#Estado').val('')
    });
});


//Alternativa

// --------------------------------------------------------------
// Autocompleta combo con BD usando interface ( widget jquery )
//---------------------------------------------------------------
//  $(document).ready(function () {
//      $('#Estado').autocomplete({
//          source: function(data,callB){
//              $.ajax({
//                  method: "GET",
//                  url: "accion/listar_ciudades.php",
//                  data: {
//                      param : data.term
//                  },
//                  dataType: "json",
//                  success: function (res) {
//                      callB(res)
//                  }
//              });
//          }
//      })
//  });




