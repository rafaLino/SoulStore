<?php
namespace src\view;

use src\controller\CadastroController;
use src\controller\ValidarConta;
use src\model\FactoryConta;


require_once ("../../vendor/autoload.php");



$conta = FactoryConta::construct(FactoryConta::ADMINISTRADOR);
$conta->setNome("Rafael");

var_dump($conta);















