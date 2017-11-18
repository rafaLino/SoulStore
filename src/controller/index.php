<?php

namespace src\controller;
use src\model\Administrador;
use src\model\FactoryConta;
use src\model\Conta;
use src\model\Cliente;
require("../../vendor/autoload.php");
session_start();
$loader = new \Twig_Loader_Filesystem(__DIR__ . "/../view");
$twig = new \Twig_Environment($loader);

$contaController = new ContaController();
    $openConta['modal'] = $contaController->getModaltoOpen();
    $log = true;
if (isset($_REQUEST['recsenhaform'])) {
    $contaController->resetSenha($_REQUEST['confirmEmail']);
}

if (isset($_REQUEST['cadastroform'])) {
    $pessoa['nome'] = $_POST['cadastrar_nome'];
    $pessoa['email'] = $_POST['cadastrar_email'];
    $pessoa['senha'] = $_POST['cadastrar_senha'];

    $contaController->cadastrar($pessoa);
}

if (isset($_REQUEST['loginform'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $log = $contaController->logar($email,$senha);

}

if (isset($_REQUEST['logout'])) {
    $_SESSION['login'] = null;
}

$index = array(
    'conta' => $openConta,
    'session' => $_SESSION,
    'login' => $log
);
echo $twig->render("index.html", $index);

