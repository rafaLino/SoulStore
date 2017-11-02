<?php
/**
 * Created by PhpStorm.
 * User: Rafael Lino
 * Date: 02/11/2017
 * Time: 12:47
 */

namespace src\model;


class Produto{
    private $id;
    private $nome;
    private $precoUnit;
    private $descricao;

    /**
     * @return id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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

    /**
     * @return preco unitário
     */
    public function getPrecoUnit()
    {
        return $this->precoUnit;
    }

    /**
     * @param mixed $precoUnit
     */
    public function setPrecoUnit($precoUnit)
    {
        $this->precoUnit = $precoUnit;
    }

    /**
     * @return descrição
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }




}