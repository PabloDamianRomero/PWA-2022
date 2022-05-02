<?php
class Actividad
{
    private $id_actividad;
    private $nombreActividad;
    private $colObjBeneficio;
    private $mensajeOperacion;

    public function __construct()
    {
        $this->id_actividad = "";
        $this->nombreActividad = "";
        $this->colObjBeneficio = array();
    }

    public function setear($id_actividad, $nombreActividad)
    {
        $this->setIdActividad($id_actividad);
        $this->setNombreActividad($nombreActividad);
    }

    /**
     * Get the value of id_actividad
     */
    public function getIdActividad()
    {
        return $this->id_actividad;
    }

    /**
     * Set the value of id_actividad
     *
     */
    public function setIdActividad($id_actividad)
    {
        $this->id_actividad = $id_actividad;
    }

    /**
     * Get the value of nombreActividad
     */
    public function getNombreActividad()
    {
        return $this->nombreActividad;
    }

    /**
     * Set the value of nombreActividad
     *
     */
    public function setNombreActividad($nombreActividad)
    {
        $this->nombreActividad = $nombreActividad;

    }

    /**
     * Get the value of colObjBeneficio
     */
    public function getColObjBeneficio()
    {
        $coleccion = array();
        $condicion = "id_actividad='" . $this->getIdActividad() . "'";
        $objBeneficio = new Beneficio();
        $colBeneficio = $objBeneficio->listar($condicion); // Obtengo los beneficio con el id_actividad
        for ($i = 0; $i < (count($colBeneficio)); $i++) {
            array_push($coleccion, $colBeneficio[$i]);
        }
        return $coleccion;
    }

    /**
     * Set the value of colObjBeneficio
     *
     */
    public function setColObjBeneficio($colObjBeneficio)
    {
        $this->colObjBeneficio = $colObjBeneficio;

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
     * @return  self
     */
    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;

    }

    public function cargar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM actividad WHERE id_actividad = " . $this->getIdActividad();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear($row['id_actividad'], $row['nombreActividad']);
                }
            }
        } else {
            $this->setMensajeOperacion("Actividad->cargar: " . $base->getError());
        }
        return $resp;
    }

    public function insertar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO actividad(id_actividad, nombreActividad)
        VALUES('" . $this->getIdActividad() . "','" . $this->getNombreActividad() . "');";
        if ($base->Iniciar()) {
            if ($id = $base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Actividad->insertar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Actividad->insertar: " . $base->getError());
        }
        return $resp;
    }

    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE actividad SET id_actividad='" . $this->getIdActividad() . "',nombreActividad='" . $this->getNombreActividad() . "' WHERE id_actividad=" . $this->getIdActividad();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Actividad->modificar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Actividad->modificar: " . $base->getError());
        }
        return $resp;
    }

    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM actividad WHERE id_actividad=" . $this->getIdActividad();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setMensajeOperacion("Actividad->eliminar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Actividad->eliminar: " . $base->getError());
        }
        return $resp;
    }

    public static function listar($condicion = "")
    {
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM actividad ";
        if ($condicion != "") {
            $sql .= 'WHERE ' . $condicion;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $base->Registro()) {
                    $obj = new Actividad();
                    $obj->setear($row['id_actividad'], $row['nombreActividad']);
                    $colBeneficio = $obj->getColObjBeneficio();
                    $obj->setColObjBeneficio($colBeneficio);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setMensajeOperacion("Actividad->listar: " . $base->getError());
        }
        return $arreglo;
    }

}
