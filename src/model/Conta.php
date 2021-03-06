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

    protected $nome;
    protected $email;
    protected $senha;
    protected $endereco;
     protected $telefone;



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
    public function getSenha()
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


    public function isAdmin(){
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