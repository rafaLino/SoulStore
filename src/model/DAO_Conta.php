<?php
/**
 * Created by PhpStorm.
 * User: Rafael Lino
 * Date: 03/11/2017
 * Time: 22:43
 */

namespace src\model;
 /** TODO: SQL comands;*/

class DAO_Conta implements DAO
{
    private $connection = null;

    public function insert( Conta $conta){
        $conexao=DB::getInstance()->getConnection();

        $array = array($email=$conta->getEmail(),$nome=$conta->getNome(),$senha=$conta->getSenha(),
            $telefone=$conta->getTelefone(),$endereco=$conta->getEndereco());
        $query = "INSERT INTO conta (email, nome, senha, tefelone, endereco)
                          VALUES ('$array[0]','$array[1]','$array[2]','$array[3]','$array[4]')";
        $exec = $conexao->prepare($query);
        $exec->execute();


    }

    function delete($conta)
    {
        // TODO: Implement delete() method.
    }

    function update($conta, $args,$values)
    {
        // TODO: Implement update() method.
    }

    function select($conta, ...$args)
    {
        // TODO: Implement select() method.
    }
}