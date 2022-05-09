

<?php

include_once "../../configuracion.php";
$objControl = new AbmCiudad;
$letra = $_GET['param'];
$where['like'] = $letra;
$data = $objControl->buscar($where);
$arr = array();
//caso normal sugerencia
$text = '<ul>';
 foreach ($data as $item){
    
    
    $text.= "<li>".$item->getDescripcion()." </li>";
     array_push($arr,$item->getDescripcion());
 }
 $text.='</ul>';
echo $text;
 


?>

