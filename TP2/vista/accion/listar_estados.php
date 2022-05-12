<?php
include_once "../../configuracion.php";
$data = data_submitted();
$objControl = new AbmEstado;
$letra = $data['param'];
$id_pais = $data['pais'];
$where['like'] = $letra;
$where['idPais'] = $id_pais;
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
