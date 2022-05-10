<?php
include_once "../../configuracion.php";
$data = data_submitted();
$objControl = new AbmCiudad;
$letra = $data['param'];
$where['like'] = $letra;
$data = $objControl->buscar($where);
$arr = array();
//caso normal sugerencia
$cadenaLista = '<ul>';
foreach ($data as $item) {
    $cadenaLista .= "<li>" . $item->getDescripcion() . " </li>";
    array_push($arr, $item->getDescripcion());
}
$cadenaLista .= '</ul>';
echo $cadenaLista;
?>
