<?php

namespace src\controller;
use src\model\Administrador;
use src\model\FactoryConta;
use src\model\Conta;
use src\model\Cliente;
require("../../vendor/autoload.php");

session_start();
$openConta = array(
    'open'=>"#loginModal",
    'session'=> $_SESSION
);
$loader = new \Twig_Loader_Filesystem( __DIR__."/../view");
$twig = new \Twig_Environment($loader);
if(isset($_SESSION['login'])){
    $usuario = (object) $_SESSION['login'];
    if($usuario->isAdmin()){
        $openConta['open']="admin.php";
    }else{
        $openConta['open']="meuCarrinho.php";
    }
}
if(isset($_REQUEST['logout'])){
    $_SESSION['login'] = null;

}

if(isset($_REQUEST['recsenhaform'])){
   $confirmEmail = $_REQUEST['confirmEmail'];
    $sendEmail = new sendEmail();
    $sendEmail->recuperarSenha($confirmEmail);
}

if(isset($_REQUEST['loginform'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $login = new loginController();
    $pessoa = $login->buscarEmail($email);
    if($pessoa->getSenha()==$senha){
        $_SESSION['login'] = $pessoa;
        header("Location:index.php");
    }
 }

if(isset($_REQUEST['cadastroform'])){

    $nome = $_POST['cadastrar_nome'];
    $email=$_POST['cadastrar_email'];
    $senha = $_POST['cadastrar_senha'];

    $conta = FactoryConta::construct(FactoryConta::CLIENTE);
    $valida = new ValidarConta($conta);
    $valida->Email($email);
    $valida->Nome($nome);
    $valida->Senha($senha);
    $cadastrar = new CadastroController();

    $cadastrar->cadastrarConta($conta);

}
   echo $twig->render("index.html", $openConta);

