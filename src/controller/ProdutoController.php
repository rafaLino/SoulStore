<?php
/**
 * Created by PhpStorm.
 * User: Rafael Lino
 * Date: 20/11/2017
 * Time: 12:57
 */

namespace src\controller;


use src\model\DAO_Produto;
use src\model\Produto;

class ProdutoController
{

    public function cadastrar($produto){

        $item = new Produto();
        $item->setNome($produto['nome']);
        $item->setPrecoUnit($produto['precoUnit']);
        $item->setDescricao($produto['descricao']);

        $dao = new DAO_Produto();
        $dao->insert($item);
    }

    public function getAll(){
        $dao = new DAO_Produto();
        return  $dao->selectAll();
    }
}