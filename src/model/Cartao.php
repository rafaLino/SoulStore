<?php
/**
 * Created by PhpStorm.
 * User: Rafael Lino
 * Date: 02/11/2017
 * Time: 13:03
 */

namespace src\model;


class Cartao
{
    private $numCartao;
    private $codigoSeg;
    private $dataValidade;
    private $nome;

    /**
     * @return mixed
     */
    public function getNumCartao()
    {
        return $this->numCartao;
    }

    /**
     * @param mixed $numCartao
     */
    public function setNumCartao($numCartao)
    {
        $this->numCartao = $numCartao;
    }

    /**
     * @return mixed
     */
    public function getCodigoSeg()
    {
        return $this->codigoSeg;
    }

    /**
     * @param mixed $codigoSeg
     */
    public function setCodigoSeg($codigoSeg)
    {
        $this->codigoSeg = $codigoSeg;
    }

    /**
     * @return mixed
     */
    public function getDataValidade()
    {
        return $this->dataValidade;
    }

    /**
     * @param mixed $dataValidade
     */
    public function setDataValidade($dataValidade)
    {
        $this->dataValidade = $dataValidade;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function incluir(){

    }

    public function excluir(){

    }

    public function validarCartao(){

    }
}