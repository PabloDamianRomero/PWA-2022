<?php
include_once "../../configuracion.php";
$objControl = new AbmActividad();
$cadena = $objControl->cargarActividadesEnSelect();
echo $cadena;
?>
