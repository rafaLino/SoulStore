<?php
/**
 * Created by PhpStorm.
 * User: Rafael Lino
 * Date: 10/11/2017
 * Time: 23:17
 */

namespace src\controller;


use src\model\Conta;
use src\model\DAO_Conta;

class loginController
{
    public function buscarEmail($email):Conta{
        $dao = new DAO_Conta();
        $result = $dao->select($email);
        return $result;
    }
}