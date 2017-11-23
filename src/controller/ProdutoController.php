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
        $result = $dao->insert($item);
        $dao = null;
        return $result;
    }

    public function getAll(){
        $dao = new DAO_Produto();
        $result =  $dao->selectAll();
        $dao = null;
        return $result;
    }

    public function excluir($id){
        $dao = new DAO_Produto();
        $result =  $dao->delete($id);
        $dao = null;
        return $result;
    }

    public function alterar($produto){
        $new = new Produto();
        $new->setId($produto['id']);
        $new->setNome($produto['nome']);
        $new->setPrecoUnit($produto['precoUnit']);
        $new->setDescricao($produto['descricao']);
        $dao = new DAO_Produto();
        $result = $dao->update($new);
        $dao = null;
        return $result;
    }
}