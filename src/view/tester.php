<?php

namespace src\view;

use src\controller\CadastroController;
use src\controller\ContaController;
use src\controller\ProdutoController;
use src\controller\ValidarConta;
use src\model\Cliente;
use src\model\DAO_Conta;
use src\model\DAO_Produto;
use src\model\FactoryConta;
use src\model\DB;
use src\model\Produto;
use src\view\RecursiveArrayObject;

require_once ("../../vendor/autoload.php");


/*$conta = FactoryConta::construct(FactoryConta::CLIENTE);
$conta->setNome("augusto");
$conta->setEmail("felipe@gmail.com");
$conta->setSenha("123456");
$conta->setTelefone("11235497561");
$conta->setEndereco("rua felipe da silva");

$array = $conta->convertToArray();


$controller = new DAO_Conta();
$controller->update($conta);*/

/*$produto = new Produto();
$produto->setId("5");
$produto->setNome("Sif");
$produto->setPrecoUnit(500);
$produto->setDescricao("Great Grey Wolf");

$controller = new DAO_Produto();
$controller->update($produto);*/



















