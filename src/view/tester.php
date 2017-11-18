<?php
namespace src\view;

use src\controller\CadastroController;
use src\controller\ValidarConta;
use src\model\FactoryConta;
use src\model\DB;
use src\view\RecursiveArrayObject;


require_once ("../../vendor/autoload.php");



//$conta = FactoryConta::construct(FactoryConta::ADMINISTRADOR);
//$conta->setNome("Rafael");

$conta = FactoryConta::construct(FactoryConta::CLIENTE);
$conta->setNome("Rafael");
$conta->setEmail("rafael@rafael.com");
$conta->setSenha("123456");
$conta->setTelefone("11364589752");
$conta->setEndereco("rua do rafael");
/*$cadastro = new CadastroController();
$cadastro->cadastrarConta($conta);*/


$array = $conta->convertToArray();
print_r($array);

















