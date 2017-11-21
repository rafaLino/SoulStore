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

    public function convertToArray():array {
        $reflect = new \ReflectionClass(get_called_class()); // Recebe todas as informações da classe
        $atributos = $reflect->getProperties(); //recebe atributos da classe
        $array = null;
        try{
            foreach($atributos as $var){ // foreach de atributos
                if($this->{$var->getName()} != null ) { // se atributo não setado.
                    $key = $var->getName(); // nome do atributo como chave
                    $array[$key] = $this->{$var->getName()}; //seta array com chave e valor do atributo
                }
            }
        }catch (\Error $e){ //caso erro
            $e->getCode();
            echo "conversão impossível";
            die;
        }
        return $array;
    }


}