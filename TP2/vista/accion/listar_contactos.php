

<?php

include_once "../../configuracion.php";
$objControl = new AbmContacto;
$data = $objControl->buscar(null);
$arr = array();
foreach ($data as $item){
    $newItem['idContacto'] = $item->getIdContacto();
    $newItem['Nombre'] = $item->getNombre();
    $newItem['Empresa'] = $item->getEmpresa();
    $newItem['Telefono'] = $item->getTelefono();
    $newItem['Mail'] = $item->getMail();
    $newItem['Comentario'] = $item->getComentario();
    array_push($arr,$newItem);
}
echo json_encode($arr);
// return $data;
?>

