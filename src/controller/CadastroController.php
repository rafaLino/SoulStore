<?php
/**
 * Created by PhpStorm.
 * User: Rafael Lino
 * Date: 03/11/2017
 * Time: 23:09
 */

namespace src\controller;

use src\model\Conta;
use src\model\DAO_Conta;
use src\model\DAO_Produto;

class CadastroController{
               public function cadastrarConta(Conta $conta){
                $daoConta = new DAO_Conta();
                return $daoConta->insert($conta);

            }

            public function cadastrarProduto(Produto $produto){
                    $daoProduto = new DAO_Produto();
                    return $daoProduto->insert($produto);
            }


}