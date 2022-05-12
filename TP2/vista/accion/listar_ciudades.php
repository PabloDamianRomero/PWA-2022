<?php
include_once "../../configuracion.php";
$objControl = new AbmEstado;
$letra = $_GET['param'];
$where['like'] = $letra;
$data = $objControl->buscar($where);
$arr = array();
 foreach ($data as $item){
    // $newItem['id'] = $item->getId();
    // $newItem['descripcion'] = $item->getDescripcion();
    // $newItem['idPais'] = $item->getIdPais();
    // $newItem['Telefono'] = $item->getTelefono();
    // $newItem['Mail'] = $item->getMail();
    // $newItem['Comentario'] = $item->getComentario();
    //caso normal de sugerencias
    
     array_push($arr,$item->getDescripcion());
 }
 
 echo json_encode($arr);
?>

