<?php

namespace src\view;
use src\model\Administrador;
use src\model\FactoryConta;
use src\model\Conta;
use src\model\Cliente;
use src\controller\ContaController;
use src\controller\ProdutoController;
require("../../vendor/autoload.php");


$loader = new \Twig_Loader_Filesystem(__DIR__ . "/../view");
$twig = new \Twig_Environment($loader);

session_start();

$contaController = new ContaController();
$log = true;

$openModal = ContaController::getModaltoOpen();

if (isset($_REQUEST['recsenhaform'])) {
    $contaController->resetSenha($_REQUEST['confirmEmail']);
    header("Location:index.php");
}

if (isset($_REQUEST['cadastroform'])) {
    $pessoa['nome'] = $_POST['cadastrar_nome'];
     $pessoa['email'] = $_POST['cadastrar_email'];
     $pessoa['senha'] = $_POST['cadastrar_senha'];

    $contaController->cadastrar($pessoa);

    header("Location:index.php");

}

if (isset($_REQUEST['loginform'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $res = $contaController->logar($email,$senha);
    if($res==0){
        header("Location:error.html");
    }
     header("Location:index.php");


}

if (isset($_REQUEST['logout'])) {
    $contaController->logout();

}

$index = array(
    'openModal'=> $openModal,
    'session' => $_SESSION,
    'login' => $log
);
echo $twig->render("index.html", $index);

