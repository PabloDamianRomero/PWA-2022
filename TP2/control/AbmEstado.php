<?php
class AbmEstado
{

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return obj
     */
    private function cargarObjeto($param)
    {
        $obj = null;

        if (array_key_exists('id', $param) and array_key_exists('descripcion', $param) and array_key_exists('idPais', $param)) {
            $obj = new Estado();
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
            $obj = new Estado();
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
        $beneficioExiste = $this->buscar($nuevoArray); // verifico si la provincia ya existe en la bd
        if ((count($beneficioExiste) == 0) and $obj != null and $obj->insertar()) {
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
            $nuevoArray['id'] = $param['id'];
            $beneficioExiste = $this->buscar($nuevoArray); // verifico si la provincia ya existe en la bd
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
            $nuevoArray['id'] = $param['id'];
            $beneficioExiste = $this->buscar($nuevoArray); // verifico si la provincia ya existe en la bd
            if ((count($beneficioExiste) > 0) and $elObjBeneficio != null and $elObjBeneficio->modificar()) {
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

            if (isset($param['idPais'])) {
                $where .= " and idPais ='" . $param['idPais'] . "'";
            }
            if (isset($param['like'])) {
                $where .= " and descripcion like  '" . $param['like'] . "%'";
            }
        }
        $arreglo = Estado::listar($where);
        return $arreglo;
    }
}
?>
