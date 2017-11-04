<?php
/**
 * Created by PhpStorm.
 * User: Rafael Lino
 * Date: 03/11/2017
 * Time: 23:09
 */

namespace src\controller;


use src\model\DAO_Conta;

class CadastroController
{
        private $conta = null;
    public function __construct($conta){
        if ($conta = null)
            $this->conta = $conta;

    }
            public function cadastrar(){
                $daoConta = new DAO_Conta();
                $daoConta->insert($this->conta);
            }


}