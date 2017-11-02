<?php
/**
 * Created by PhpStorm.
 * User: Rafael Lino
 * Date: 02/11/2017
 * Time: 13:01
 */

namespace src\model;


class Boleto
{
    private $preco;
    private $codigo;
    private $dataVenc;

    /**
     * @return mixed
     */
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * @param mixed $preco
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    /**
     * @return mixed
     */
    public function getDataVenc()
    {
        return $this->dataVenc;
    }

    /**
     * @param mixed $dataVenc
     */
    public function setDataVenc($dataVenc)
    {
        $this->dataVenc = $dataVenc;
    }

    public function emitirBoleto(){

    }
}