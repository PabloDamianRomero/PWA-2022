<?php
class Contacto
{
    private $IdContacto;
    private $Nombre;
    private $Empresa;
    private $Telefono;
    private $Mail;
    private $Comentario;
    private $mensajeOperacion;

    public function __construct()
    {
        $this->IdContacto = "";
        $this->Nombre = "";
        $this->Empresa = "";
        $this->Telefono = "";
        $this->Mail = "";
        $this->Comentario = "";
    }

    public function setear($IdContacto, $Nombre, $Empresa, $Telefono, $Mail, $Comentario)
    {
        $this->setIdContacto($IdContacto);
        $this->setNombre($Nombre);
        $this->setEmpresa($Empresa);
        $this->setTelefono($Telefono);
        $this->setMail($Mail);
        $this->setComentario($Comentario);
    }

    /**
     * Get the value of IdContacto
     */
    public function getIdContacto()
    {
        return $this->IdContacto;
    }

    /**
     * Set the value of IdContacto
     *
     */
    public function setIdContacto($IdContacto)
    {
        $this->IdContacto = $IdContacto;
    }

    /**
     * Get the value of Nombre
     */
    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * Set the value of Nombre
     *
     */
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }

    /**
     * Get the value of Empresa
     */
    public function getEmpresa()
    {
        return $this->Empresa;
    }

    /**
     * Set the value of Empresa
     *
     */
    public function setEmpresa($Empresa)
    {
        $this->Empresa = $Empresa;
    }

    /**
     * Get the value of Telefono
     */
    public function getTelefono()
    {
        return $this->Telefono;
    }

    /**
     * Set the value of Telefono
     *
     */
    public function setTelefono($Telefono)
    {
        $this->Telefono = $Telefono;
    }

    /**
     * Get the value of Mail
     */
    public function getMail()
    {
        return $this->Mail;
    }

    /**
     * Set the value of Mail
     *
     */
    public function setMail($Mail)
    {
        $this->Mail = $Mail;
    }

    /**
     * Get the value of Comentario
     */
    public function getComentario()
    {
        return $this->Comentario;
    }

    /**
     * Set the value of Comentario
     *
     */
    public function setComentario($Comentario)
    {
        $this->Comentario = $Comentario;
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
        $sql = "SELECT * FROM contactos WHERE IdContacto = " . $this->getIdContacto();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear($row['IdContacto'], $row['Nombre'], $row['Empresa'], $row['Telefono'], $row['Mail'], $row['Comentario']);
                }
            }
        } else {
            $this->setMensajeOperacion("Contactos->cargar: " . $base->getError());
        }
        return $resp;
    }

    public function insertar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO contactos(IdContacto, Nombre, Empresa, Telefono, Mail, Comentario)
        VALUES('" . $this->getIdContacto() . "','" . $this->getNombre() . "','" . $this->getEmpresa() . "','" . $this->getTelefono() . "','" . $this->getMail() . "','" . $this->getComentario() . "');";
        if ($base->Iniciar()) {
            if ($id = $base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Contactos->insertar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Contactos->insertar: " . $base->getError());
        }
        return $resp;
    }

    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE contactos SET IdContacto='" . $this->getIdContacto() . "',Nombre='" . $this->getNombre() . "',Empresa='" . $this->getEmpresa() . "',Telefono='" . $this->getTelefono() . "',Mail='" . $this->getMail() . "',Comentario='" . $this->getComentario() . "' WHERE IdContacto=" . $this->getIdContacto();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Contactos->modificar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Contactos->modificar: " . $base->getError());
        }
        return $resp;
    }

    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM contactos WHERE IdContacto=" . $this->getIdContacto();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setMensajeOperacion("Contactos->eliminar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Contactos->eliminar: " . $base->getError());
        }
        return $resp;
    }

    public static function listar($condicion = "")
    {
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM contactos ";
        if ($condicion != "") {
            $sql .= 'WHERE ' . $condicion;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $base->Registro()) {
                    $obj = new Contacto();
                    $obj->setear($row['IdContacto'], $row['Nombre'], $row['Empresa'], $row['Telefono'], $row['Mail'], $row['Comentario']);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setMensajeOperacion("Contactos->listar: " . $base->getError());
        }
        return $arreglo;
    }

}
