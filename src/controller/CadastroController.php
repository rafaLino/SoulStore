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
               public function cadastrar($conta){
                $daoConta = new DAO_Conta();
                $daoConta->insert($conta);



            }




}