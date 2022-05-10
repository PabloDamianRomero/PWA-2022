<?php

class Ciudad
{
    private $id;
    private $descripcion;
    private $idPais;
    private $mensajeOperacion;

    public function __construct()
    {
        $this->id = '';
        $this->descripcion = '';
        $this->idPais = '';
    }

    public function setear($id, $descr, $id_pais)
    {
        $this->setId($id);
        $this->setDescripcion($descr);
        $this->setIdPais($id_pais);

    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getIdPais()
    {
        return $this->idPais;
    }

    public function setIdPais($idPais)
    {
        $this->idPais = $idPais;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    public function getMensajeOperacion()
    {
        return $this->mensajeOperacion;
    }
    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;

    }

    public function cargar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM estados WHERE id = " . $this->getId();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear($row['id'], $row['descripcion'], $row['id_pais']);
                }
            }
        } else {
            $this->setMensajeOperacion("Ciudad->cargar: " . $base->getError());
        }
        return $resp;
    }

    public function insertar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO estados(descripcion, idPais)
        VALUES('" . $this->getDescripcion() . "','" . $this->getIdPais() . "');";
        if ($base->Iniciar()) {
            if ($id = $base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Ciudad->insertar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Ciudad->insertar: " . $base->getError());
        }
        return $resp;
    }

    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE estado SET idPais = '" . $this->getIdPais() . "', Descripcion='" . $this->getDescripcion() . "' WHERE id=" . $this->getId();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Ciudad->modificar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Ciudad->modificar: " . $base->getError());
        }
        return $resp;
    }

    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM estados WHERE id=" . $this->getId();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setMensajeOperacion("Ciudad->eliminar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Ciudad->eliminar: " . $base->getError());
        }
        return $resp;
    }

    public static function listar($condicion = "")
    {
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM estados ";
        if ($condicion != "") {
            $sql .= 'WHERE ' . $condicion;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $base->Registro()) {
                    $obj = new Ciudad();

                    $obj->setear($row['id'], $row['descripcion'], $row['idPais']);
                    // $colBeneficio = $obj->getColObjBeneficio();
                    // $obj->setColObjBeneficio($colBeneficio);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setMensajeOperacion("Ciudad->listar: " . $base->getError());
        }
        return $arreglo;
    }

}
?>
