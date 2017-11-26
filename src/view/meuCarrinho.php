<?php
/**
 * Created by PhpStorm.
 * User: Rafael Lino
 * Date: 18/11/2017
 * Time: 11:26
 */
namespace src\view;

use src\controller\ContaController;
use src\controller\ProdutoController;
require("../../vendor/autoload.php");
session_start();
$loader = new \Twig_Loader_Filesystem(__DIR__ . "/../view");
$twig = new \Twig_Environment($loader);

$openModal = ContaController::getModaltoOpen();
$contaController = new ContaController();

if (isset($_REQUEST['logout'])) {
    $contaController->logout();
}

if(isset($_REQUEST['cliente_email'])){
    $usuario['email'] = $_REQUEST['cliente_email'];
    $usuario['nome'] = $_REQUEST['cliente_nome'];
    $usuario['senha'] = $_REQUEST['cliente_senha'];
    $usuario['endereco'] = $_REQUEST['cliente_endereco'];
    $usuario['telefone'] = $_REQUEST['cliente_telefone'];

    $contaController->alterar($usuario);
    header("Location:meuCarrinho.php");
}
if(isset($_REQUEST['RemoverContaForm'])){
    $id = $_REQUEST['RemoverContaForm'];

    $contaController->excluir($id);
}
$carrinho = array(
    'openModal' => $openModal,
    'session' => $_SESSION,

);
echo $twig->render("meuCarrinho.html",$carrinho);