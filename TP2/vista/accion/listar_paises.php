<?php
include_once "../../configuracion.php";
$objControl = new AbmPais();
$cadena = $objControl->cargarPaisesEnSelect();
echo $cadena;
?>
