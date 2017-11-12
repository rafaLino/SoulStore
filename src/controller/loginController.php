<?php
/**
 * Created by PhpStorm.
 * User: Rafael Lino
 * Date: 10/11/2017
 * Time: 23:17
 */

namespace src\controller;


use src\model\Cliente;
use src\model\Conta;
use src\model\DAO_Conta;
use src\model\FactoryConta;

class loginController
{

    public function buscarEmail($email){
        $dao = new DAO_Conta();
        $result = $dao->select($email);

        if(!$result || $result == null) {
            return false;
        }
            $conta = new Conta();
            $conta->setNome($result['nome']);
            $conta->setEmail($result['email']);
            $conta->setSenha($result['senha']);
            $conta->setEndereco($result['endereco']);
            $conta->setTelefone($result['telefone']);

        return $conta;
    }
}