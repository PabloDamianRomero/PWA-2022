<?php
class AbmPais
{

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return obj
     */
    private function cargarObjeto($param)
    {
        $obj = null;

        if (array_key_exists('id', $param) and array_key_exists('descripcion', $param)) {
            $obj = new Pais();
            $obj->setear($param['id'], $param['descripcion'], $param['idPais']);
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Beneficio
     */
    private function cargarObjetoConClave($param)
    {
        $obj = null;

        if (isset($param['id'])) {
            $obj = new Pais();
            $obj->setear($param['id'], null, null);
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
        if (isset($param['id'])) {
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
        $obj = $this->cargarObjeto($param);
        $nuevoArray['id'] = $param['id'];
        $paisExiste = $this->buscar($nuevoArray); // verifico si la pais ya existe en la bd
        if ((count($paisExiste) == 0) and $obj != null and $obj->insertar()) {
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
            $elObjPais = $this->cargarObjetoConClave($param);
            $nuevoArray['id'] = $param['id'];
            $paisExiste = $this->buscar($nuevoArray); // verifico si la pais ya existe en la bd
            if ((count($paisExiste) > 0) and $elObjPais != null and $elObjPais->eliminar()) {
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
            $elObjPais = $this->cargarObjeto($param);
            $nuevoArray['id'] = $param['id'];
            $paisExiste = $this->buscar($nuevoArray); // verifico si la pais ya existe en la bd
            if ((count($paisExiste) > 0) and $elObjPais != null and $elObjPais->modificar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * permite buscar un objeto
     * @param array $param
     * @return array
     */
    public function buscar($param)
    {
        $where = " true ";
        if ($param != null) {
            if (isset($param['id'])) {
                $where .= " and id ='" . $param['id'] . "'";
            }

            if (isset($param['descripcion'])) {
                $where .= " and descripcion ='" . $param['descripcion'] . "'";
            }
        }
        $arreglo = Pais::listar($where);
        return $arreglo;
    }

    public function cargarPaisesEnSelect()
    {
        $arreglo = Pais::listar();
        $cadena = "";
        foreach ($arreglo as $item) {
            if($item->getId() == 0){
                $cadena .= '<option value="' . $item->getId() . '" selected="selected" disabled="disabled">' . $item->getDescripcion() . '</option>';
            }else{
                $cadena .= '<option value="' . $item->getId() . '">' . $item->getDescripcion() . '</option>';
            }
        }
        return $cadena;
    }
}
?>
