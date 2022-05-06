<?php
include_once "../../configuracion.php";
$data = data_submitted();

$objControl = new AbmEstado();
if(isset($data['descripcion']) && $data['descripcion'] != ''){
    $arreglo = $objControl->sugerencias($data['descripcion']);
    foreach ($arreglo as $item) {
        echo '<span class="badge bg-secondary m-1">'.$item->getDescripcion().'</span>';
    }
}

?>