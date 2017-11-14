<?php
namespace src\view;

use src\controller\CadastroController;
use src\controller\ValidarConta;
use src\model\FactoryConta;


require_once ("../../vendor/autoload.php");



//$conta = FactoryConta::construct(FactoryConta::ADMINISTRADOR);
//$conta->setNome("Rafael");

$conta = FactoryConta::construct(FactoryConta::CLIENTE);
$conta->setNome("Caique");
$conta->setEmail("caique@caique.com");
$conta->setSenha("123456");
$conta->setTelefone("11235468791");
$conta->setEndereco("rua da silva");
$cadastro = new CadastroController();
$cadastro->cadastrarConta($conta);

//var_dump($conta);















