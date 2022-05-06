<?php
class Estado{
    private $id;
    private $descripcion;
    // private $objPais;
    private $mensajeOperacion;

    public function __construct(){
        $this->id = "";
        $this->descripcion = "";
        // $this->objPais = null;
    }

    public function setear($id, $descripcion){
    // public function setear($id, $descripcion, $objPais){
        $this->setId($id);
        $this->setDescripcion($descripcion);
        // $this->setObjPais($objPais);
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */ 
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * Get the value of objPais
     */ 
    public function getObjPais()
    {
        return $this->objPais;
    }

    /**
     * Set the value of objPais
     *
     */ 
    public function setObjPais($objPais)
    {
        $this->objPais = $objPais;
    }

  

    /**
     * Get the value of mensajeOperacion
     */ 
    public function getMensajeOperacion()
    {
        return $this->mensajeOperacion;
    }

    /**
     * Set the value of mensajeOperacion
     *
     */ 
    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;

    }

    public function cargar(){
        $resp = false;
        $base = new BaseDatos();
        $sql="SELECT * FROM estados WHERE id = ".$this->getId();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    // $pais = new Pais();
                    // $pais->setId($row['id']);
                    // $pais->cargar();
                    $pais = null;
                    $this->setear($row['id'], $row['descripcion'], $pais);
                    
                }
            }
        } else {
            $this->setMensajeOperacion("Estado->cargar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp = false;
        $base = new BaseDatos();
        // $id_pais = $this->getObjPais()->getId();
        $id_pais = null;
        $sql = "INSERT INTO estados(id, descripcion, idPais)  VALUES('".$this->getId()."', '".$this->getDescripcion()."', '".$id_pais."');";
        if ($base->Iniciar()) {
            if ($id = $base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Estado->insertar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Estado->insertar: ".$base->getError());
        }
        return $resp;
    }

    public function modificar(){
        $resp = false;
        $base = new BaseDatos();
        // $id_pais = $this->getObjPais()->getId();
        $id_pais = null;
        $sql = "UPDATE estados SET id='".$this->getId()."',descripcion='".$this->getDescripcion()."',idPais='".$id_pais."' WHERE id='".$this->getId()."'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Estado->modificar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Estado->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM estados WHERE id=".$this->getId();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setMensajeOperacion("Estado->eliminar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Estado->eliminar: ".$base->getError());
        }
        return $resp;
    }

    public static function listar($condicion = ""){
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM estados ";
        if ($condicion!="") {
            $sql.='WHERE '.$condicion;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while ($row = $base->Registro()){                    
                    $obj= new Estado();
                    // $pais = new Pais();
                    // $pais->setId($row['id']);
                    // $pais->cargar();
                    $pais = null;
                    // $obj->setear($row['id'], $row['descripcion'], $pais);
                    $obj->setear($row['id'], $row['descripcion']);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setMensajeOperacion("Estado->listar: ".$base->getError());
        }
        return $arreglo;
    }

    public static function listarCoincidencia($palabra){
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM estados WHERE descripcion LIKE '".$palabra."%'";
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while ($row = $base->Registro()){   
                    $obj= new Estado();       
                    $obj->setear($row['id'], $row['descripcion']);      
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setMensajeOperacion("Estado->listarCoincidencia: ".$base->getError());
        }
        return $arreglo;
    }

    
}

?>