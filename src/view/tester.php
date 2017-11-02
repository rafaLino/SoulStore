<?php
namespace src\view;

use src\model\Administrador;
//require_once ("DB.php");
require("../../vendor/autoload.php");

    $conta = new Administrador();
    $conta->setCpf("27071657432"); // cpf válido;
    echo $conta->getCpf();





