<?php
class AbmBeneficio
{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Beneficio
     */
    private function cargarObjeto($param)
    {
        $obj = null;

        if (array_key_exists('id_beneficio', $param) and array_key_exists('nombreBeneficio', $param) and array_key_exists('objActividad', $param)) {
            $obj = new Beneficio();
            $obj->setear($param['id_beneficio'], $param['nombreBeneficio'], $param['objActividad']);
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

        if (isset($param['id_beneficio'])) {
            $obj = new Beneficio();
            $obj->setear($param['id_beneficio'], null, null, null);
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
        if (isset($param['id_beneficio'])) {
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
        $elObjBeneficio = $this->cargarObjeto($param);
        $nuevoArray['id_beneficio'] = $param['id_beneficio'];
        $beneficioExiste = $this->buscar($nuevoArray); // verifico si el auto ya existe en la bd
        if ((count($beneficioExiste) == 0) and $elObjBeneficio != null and $elObjBeneficio->insertar()) {
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
            $elObjBeneficio = $this->cargarObjetoConClave($param);
            $nuevoArray['id_beneficio'] = $param['id_beneficio'];
            $beneficioExiste = $this->buscar($nuevoArray); // verifico si el auto ya existe en la bd
            if ((count($beneficioExiste) > 0) and $elObjBeneficio != null and $elObjBeneficio->eliminar()) {
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
            $elObjBeneficio = $this->cargarObjeto($param);
            $nuevoArray['id_beneficio'] = $param['id_beneficio'];
            $beneficioExiste = $this->buscar($nuevoArray); // verifico si el auto ya existe en la bd
            if ((count($beneficioExiste) > 0) and $elObjBeneficio != null and $elObjBeneficio->modificar()) {
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
            if (isset($param['id_beneficio'])) {
                $where .= " and id_beneficio ='" . $param['id_beneficio'] . "'";
            }

            if (isset($param['nombreBeneficio'])) {
                $where .= " and Marca ='" . $param['marca'] . "'";
            }

            if (isset($param['id_actividad'])) {
                $where .= " and id_actividad ='" . $param['id_actividad'] . "'";
            }

        }
        $arreglo = Beneficio::listar($where);
        return $arreglo;
    }

    public function cargarBeneficiosEnSelect($param)
    {
        $where = " true ";
        if ($param != null) {  

            if (isset($param['id'])) {
                $where .= " and id_actividad ='" . $param['id'] . "'";
            }
        }

        $arreglo = Beneficio::listar($where);
        $cadena = '';
        foreach ($arreglo as $item) {
            $cadena .= '<option value="' . $item->getIdBeneficio() . '">' . $item->getNombreBeneficio() . '</option>';
        }
        return $cadena;

    }


}
