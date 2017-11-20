<?php
namespace src\view;

use src\controller\CadastroController;
use src\controller\ContaController;
use src\controller\ValidarConta;
use src\model\Cliente;
use src\model\DAO_Conta;
use src\model\FactoryConta;
use src\model\DB;
use src\view\RecursiveArrayObject;


require_once ("../../vendor/autoload.php");


$conta['nome'] = "rafael";
$conta['email']="rafael@gmail.com";
$conta['senha']="123456";

/*$controller = new ContaController();


$controller->cadastrar($conta);*/

$dao = new DAO_Conta();
$res = $dao->selectConta("rafael@gmail.com","1234");

//print_r($res);
echo $res->getSenha();















