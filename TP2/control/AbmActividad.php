<?php
class AbmActividad
{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Actividad
     */
    private function cargarObjeto($param)
    {
        $obj = null;
        if (array_key_exists('id_actividad', $param) and array_key_exists('nombreActividad', $param)) {
            $obj = new Actividad();
            $obj->setear($param['id_actividad'], $param['nombreActividad']);
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Actividad
     */
    private function cargarObjetoConClave($param)
    {
        $obj = null;
        if (isset($param['id_actividad'])) { // id correspondiente al input de borrar
            $obj = new Actividad();
            $obj->setear($param['id_actividad'], null, null, null, null, null);
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
        if (isset($param['id_actividad'])) {
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
        $elObjActividad = $this->cargarObjeto($param);
        $nuevoArray['id_actividad'] = $param['id_actividad'];
        $actividadExiste = $this->buscar($nuevoArray); // verifico si la actividad ya existe en la bd
        if ((count($actividadExiste) == 0) and $elObjActividad != null and $elObjActividad->insertar()) {
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
            $elObjActividad = $this->cargarObjetoConClave($param);
            $nuevoArray['id_actividad'] = $param['id_actividad'];
            $actividadExiste = $this->buscar($nuevoArray); // verifico si la actividad ya existe en la bd
            if ((count($actividadExiste) > 0) and $elObjActividad != null and $elObjActividad->eliminar()) {
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
            $elObjActividad = $this->cargarObjeto($param);
            $nuevoArray['id_actividad'] = $param['id_actividad'];
            $actividadExiste = $this->buscar($nuevoArray); // verifico si la actividad ya existe en la bd
            if ((count($actividadExiste) > 0) and $elObjActividad != null and $elObjActividad->modificar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * permite buscar un objeto
     * @param array $param
     * @return boolean
     */
    public function buscar($param)
    {

        $where = " true ";
        if ($param != null) {
            if (isset($param['id_actividad'])) {
                $where .= " and id_actividad =" . $param['id_actividad'];
            }

            if (isset($param['nombreActividad'])) {
                $where .= " and nombreActividad ='" . $param['nombreActividad'] . "'";
            }

        }
        $arreglo = Actividad::listar($where);
        return $arreglo;

    }

    public function cargarActividadesEnSelect()
    {
        $arreglo = Actividad::listar();
        $cadena = "";
        foreach ($arreglo as $item) {
            $cadena .= '<option value="' . $item->getIdActividad() . '">' . $item->getNombreActividad() . '</option>';
        }
        return $cadena;

    }

}
