<?php
namespace src\view;

use src\controller\CadastroController;
use src\controller\ValidarConta;
use src\model\FactoryConta;


require_once ("../../vendor/autoload.php");




    $pessoa = FactoryConta::construct(FactoryConta::ADMINISTRADOR);
    $valida = new ValidarConta($pessoa);
    $valida->Cpf('27071657432');
    $valida->Email('TESTES_TESTE@gmail.com');
    $valida->Nome("Rafael");
    $valida->Endereco("rua são paulo","2","são paulo","são paulo","sp");
    $valida->Telefone("(11)4444-8888");

    echo $pessoa->isAdmin() ? "sim" : "não";












