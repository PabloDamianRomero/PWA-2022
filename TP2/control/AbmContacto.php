<?php
class AbmContacto
{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Contacto
     */
    private function cargarObjeto($param)
    {
        $obj = null;
        if (array_key_exists('IdContacto', $param) and array_key_exists('Nombre', $param) and array_key_exists('Empresa', $param) and array_key_exists('Telefono', $param) and array_key_exists('Mail', $param) and array_key_exists('Comentario', $param)) {
            $obj = new Contacto();
            $obj->setear($param['IdContacto'], $param['Nombre'], $param['Empresa'], $param['Telefono'], $param['Mail'], $param['Comentario']);
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Contacto
     */
    private function cargarObjetoConClave($param)
    {
        $obj = null;
        if (isset($param['IdContacto'])) { // id correspondiente al input de borrar
            $obj = new Contacto();
            $obj->setear($param['IdContacto'], null, null, null, null, null);
        }
        return $obj;
    }

    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */

    private function seteadosCamposClaves($param)
    {
        $resp = false;
        if (isset($param['IdContacto'])) {
            $resp = true;
        }
        return $resp;
    }

    /**
     *
     * @param array $param
     */
    public function alta($param)
    {
        $resp = false;
        $param['IdContacto'] = null;
        $elObjContacto = $this->cargarObjeto($param);
        if ($elObjContacto != null and $elObjContacto->insertar()) {
            $resp = true;
        }
        return $resp;
    }

    /**
     * permite eliminar un objeto
     * @param array $param
     * @return boolean
     */
    public function baja($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjContacto = $this->cargarObjetoConClave($param);
            $nuevoArray['IdContacto'] = $param['IdContacto'];
            $contactoExiste = $this->buscar($nuevoArray); // verifico si la actividad ya existe en la bd
            if ((count($contactoExiste) > 0) and $elObjContacto != null and $elObjContacto->eliminar()) {
                $resp = true;
            }
        }

        return $resp;
    }

    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjContacto = $this->cargarObjeto($param);
            $nuevoArray['IdContacto'] = $param['IdContacto'];
            $contactoExiste = $this->buscar($nuevoArray); // verifico si la actividad ya existe en la bd
            if ((count($contactoExiste) > 0) and $elObjContacto != null and $elObjContacto->modificar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * permite buscar un objeto
     * @param array 
     * @return 
     */
    // public function setear($IdContacto, $Nombre, $Empresa, $Telefono, $Mail, $Comentario)
    public function buscar($param)
    {

        $where = " true ";
        if ($param != null) {
            if (isset($param['IdContacto'])) {
                $where .= " and IdContacto =" . $param['IdContacto'];
            }

            if (isset($param['Nombre'])) {
                $where .= " and Nombre ='" . $param['Nombre'] . "'";
            }

            if (isset($param['Empresa'])) {
                $where .= " and Empresa ='" . $param['Empresa'] . "'";
            }

            if (isset($param['Telefono'])) {
                $where .= " and Telefono ='" . $param['Telefono'] . "'";
            }

            if (isset($param['Mail'])) {
                $where .= " and Mail ='" . $param['Mail'] . "'";
            }

            if (isset($param['Comentario'])) {
                $where .= " and Comentario ='" . $param['Comentario'] . "'";
            }

        }
        $arreglo = Contacto::listar($where);
        return $arreglo;
    }

    public function registroContacto($datos)
    {
        $mensaje = "";
        $resp = false;
        $contactoExiste = $this->buscar(["Nombre" => $datos['Nombre'], "Empresa" => $datos['Empresa'], "Telefono" => $datos['Telefono'], "Mail" => $datos['Mail']]);
        if (!$contactoExiste) { // si no existe el contacto en bd
            $resp = $this->alta($datos);
            if ($resp) { // si el contacto se pudo insertar en bd
                $mensaje = "<p><strong>OK</strong>. Contacto registrado.</p>";
            } else {
                $mensaje = "<p style='background-color: #ebff99'; padding: inherit;'><strong class='text-danger'>Error</strong>. No se pudo registrar al contacto.</p>";
            }
        } else {
            $mensaje = "<p style='background-color: #99d9ff;
            padding: inherit;
            border: 1px solid #fff;'><strong class='text-danger'>Error</strong>. El contacto ya existe en la BD.</p>";
        }
        return $mensaje;
    }

}
