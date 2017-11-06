<?php
namespace src\view;

use src\controller\CadastroController;
use src\controller\ValidaConta;


//require_once ("DB.php");
require("../../vendor/autoload.php");


    $valida = new ValidaConta("Administrador");
    $valida->Cpf('27071657432');
    $valida->Email('TESTES_TESTE@gmail.com');
    $valida->Nome("Rafael");
    $valida->Endereco("rua são paulo","2","são paulo","são paulo","sp");
    $valida->Telefone("(11)4444-8888");
    $conta = $valida->getConta();

    var_dump($conta);










