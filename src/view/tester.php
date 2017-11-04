<?php
namespace src\view;

use src\controller\CadastroController;
use src\controller\ValidaConta;

//require_once ("DB.php");
require("../../vendor/autoload.php");


    $conta = new ValidaConta();
    $conta->setCpf('27071657432');
    $conta->setEmail('TESTES_TESTE@gmail.com');
    $conta->setNome("Rafael");
    $conta->setEndereco("rua são paulo","2","são paulo","são paulo","sp");
    $conta->setTelefone("(11)4444-8888");

        $insert = new CadastroController($conta);

    printf("cpf: %s\nemail: %s\nnome: %s",
        $conta->getClass()->getCpf(),$conta->getClass()->getEmail(),$conta->getClass()->getNome());
    echo "\n" . $conta->getClass()->getEndereco();
    echo "\n".$conta->getClass()->getTelefone();








