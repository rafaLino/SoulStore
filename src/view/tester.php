<?php
namespace src\view;

use src\controller\CadastroController;
use src\controller\ValidaConta;
use src\model\Email;

//require_once ("DB.php");
require("../../vendor/autoload.php");


    $conta = new ValidaConta();
    $conta->Cpf('27071657432');
    $conta->Email('TESTES_TESTE@gmail.com');
    $conta->Nome("Rafael");
    $conta->Endereco("rua são paulo","2","são paulo","são paulo","sp");
    $conta->Telefone("(11)4444-8888");

        $cadastrar = new CadastroController();
        $cadastrar->cadastrar($conta);

    printf("cpf: %s\nemail: %s\nnome: %s",
        $conta->getClass()->getCpf(),$conta->getClass()->getEmail(),$conta->getClass()->getNome());
    echo "\n" . $conta->getClass()->getEndereco();
    echo "\n".$conta->getClass()->getTelefone();


        $conta = Email::getConstants();
        print_r($conta);







