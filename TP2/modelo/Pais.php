<?php

class Pais
{
    private $id;
    private $descripcion;
    private $mensajeOperacion;

    public function __construct()
    {
        $this->id = '';
        $this->descripcion = '';
    }

    public function setear($id, $descripcion)
    {
        $this->setId($id);
        $this->setDescripcion($descripcion);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
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
        $sql = "SELECT * FROM paises WHERE id = " . $this->getId();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear($row['id'], $row['descripcion']);
                }
            }
        } else {
            $this->setMensajeOperacion("Pais->cargar: " . $base->getError());
        }
        return $resp;
    }

    public function insertar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO paises(descripcion)
        VALUES('" . $this->getDescripcion() . "');";
        if ($base->Iniciar()) {
            if ($id = $base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Pais->insertar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Pais->insertar: " . $base->getError());
        }
        return $resp;
    }

    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE paises SET descripcion='" . $this->getDescripcion() . "' WHERE id=" . $this->getId();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Pais->modificar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Pais->modificar: " . $base->getError());
        }
        return $resp;
    }

    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM paises WHERE id=" . $this->getId();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setMensajeOperacion("Pais->eliminar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Pais->eliminar: " . $base->getError());
        }
        return $resp;
    }

    public static function listar($condicion = "")
    {
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM paises ";
        if ($condicion != "") {
            $sql .= 'WHERE ' . $condicion;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $base->Registro()) {
                    $obj = new Pais();
                    $obj->setear($row['id'], $row['descripcion']);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setMensajeOperacion("Pais->listar: " . $base->getError());
        }
        return $arreglo;
    }

}
