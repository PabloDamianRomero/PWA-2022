<?php
include_once "../../configuracion.php";
$datos = data_submitted();
$objControl = new AbmContacto();
$mensaje = $objControl->registroContacto($datos);
echo $mensaje;
?>