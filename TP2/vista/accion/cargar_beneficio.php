<?php
include_once "../../configuracion.php";
$data = data_submitted();
$objControl = new AbmBeneficio();
$cadena = $objControl->cargarBeneficiosEnSelect($data);
echo $cadena;
?>
