<?php
class Beneficio{
    private $id_beneficio;
    private $nombreBeneficio;
    private $objActividad;
    private $mensajeOperacion;

    public function __construct(){
        $this->id_beneficio = "";
        $this->nombreBeneficio = "";
        $this->objActividad = "";
        $this->mensajeOperacion = "";
    }

    public function setear($id_beneficio, $nombreBeneficio, $objActividad){
        $this->setIdBeneficio($id_beneficio);
        $this->setNombreBeneficio($nombreBeneficio);
        $this->setObjActividad($objActividad);
    }

    /**
     * Get the value of id_beneficio
     */ 
    public function getIdBeneficio()
    {
        return $this->id_beneficio;
    }

    /**
     * Set the value of id_beneficio
     *
     */ 
    public function setIdBeneficio($id_beneficio)
    {
        $this->id_beneficio = $id_beneficio;
    }

    /**
     * Get the value of nombreBeneficio
     */ 
    public function getNombreBeneficio()
    {
        return $this->nombreBeneficio;
    }

    /**
     * Set the value of nombreBeneficio
     *
     */ 
    public function setNombreBeneficio($nombreBeneficio)
    {
        $this->nombreBeneficio = $nombreBeneficio;
    }


    /**
     * Get the value of objActividad
     */ 
    public function getObjActividad()
    {
        return $this->objActividad;
    }

    /**
     * Set the value of objActividad
     *
     */ 
    public function setObjActividad($objActividad)
    {
        $this->objActividad = $objActividad;

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
        $sql="SELECT * FROM beneficio WHERE id_beneficio = ".$this->getIdBeneficio();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $actividad = new Actividad();
                    $actividad->setIdActividad($row['id_actividad']);
                    $actividad->cargar();
                    $this->setear($row['id_beneficio'], $row['nombreBeneficio'], $actividad);
                    
                }
            }
        } else {
            $this->setMensajeOperacion("Beneficio->listar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp = false;
        $base = new BaseDatos();
        $id_actividad = $this->getObjActividad()->getIdActividad();
        $sql = "INSERT INTO beneficio(id_beneficio, nombreBeneficio, id_actividad)  VALUES('".$this->getIdBeneficio()."', '".$this->getNombreBeneficio()."', '".$id_actividad."');";
        if ($base->Iniciar()) {
            if ($id = $base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Beneficio->insertar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Beneficio->insertar: ".$base->getError());
        }
        return $resp;
    }

    public function modificar(){
        $resp = false;
        $base = new BaseDatos();
        $id_actividad = $this->getObjActividad()->getIdActividad();
        $sql = "UPDATE beneficio SET id_beneficio='".$this->getIdBeneficio()."',nombreBeneficio='".$this->getNombreBeneficio()."',id_actividad='".$id_actividad."' WHERE id_beneficio='".$this->getIdBeneficio()."'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Beneficio->modificar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Beneficio->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM beneficio WHERE id_beneficio=".$this->getIdBeneficio();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setMensajeOperacion("Beneficio->eliminar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Beneficio->eliminar: ".$base->getError());
        }
        return $resp;
    }

    public static function listar($condicion = ""){
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM beneficio ";
        if ($condicion!="") {
            $sql.='WHERE '.$condicion;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while ($row = $base->Registro()){                    
                    $obj= new Beneficio();
                    $actividad = new Actividad();
                    $actividad->setIdActividad($row['id_actividad']);
                    $actividad->cargar();
                    $obj->setear($row['id_beneficio'], $row['nombreBeneficio'], $actividad);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setMensajeOperacion("Beneficio->listar: ".$base->getError());
        }
        return $arreglo;
    }
}

?>