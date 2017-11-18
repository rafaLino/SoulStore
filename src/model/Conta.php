<?php
/**
 * Created by PhpStorm.
 * User: Rafael Lino
 * Date: 02/11/2017
 * Time: 12:23
 */

namespace src\model;

 class Conta
{

    public $nome;
    public $email;
    public $senha;
    public $endereco;
    public $telefone;



    /**
     * @return string
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
     * @
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email=$email;
    }

    /**
     * @return string
     */
    public function getSenha():string
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    /**
     * @return string
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    /**
     * @return int
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }


    public function isAdmin():bool{
        if($this instanceof Administrador){
            return true;
        }else{
            return false;
        }
    }



    public function __toString():string
    {
       $string = array(
           "nome" => $this->nome,
            "email" => $this->email,
            "endereco"=> $this->endereco,
            "telefone"=> $this->telefone
       );
         $stringBuilder=print_r($string);

        return $stringBuilder;
    }

     public function convertToArray():array {
         $reflect = new \ReflectionClass(get_called_class()); // Recebe todas as informações de FactoryConta
         $atributos = $reflect->getProperties(); //recebe atributos da classe
        try{
             foreach($atributos as $var){ // foreach de atributos
                   $key = $var->getName(); // recebe nome do atributo como chave
                   $array[$key] = $this->{$var->getName()};
             }
 }catch (\Error $e){ //caso erro
             $e->getCode();
             echo "conversão impossível";
             die;
         }
         return $array;
     }


}