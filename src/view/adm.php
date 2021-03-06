<?php

namespace src\view;
use src\controller\ContaController;
use src\controller\ProdutoController;
require("../../vendor/autoload.php");
$loader = new \Twig_Loader_Filesystem(__DIR__ . "/../view");
$twig = new \Twig_Environment($loader);
session_start();

$contaController = new ContaController();
$produtoController = new ProdutoController();
$openModal = ContaController::getModaltoOpen();
$cliente = $contaController->getAll();
$produto = $produtoController->getAll();

if(isset($_REQUEST['add'])){
    $produto['nome'] = $_REQUEST['nome-produto'];
    $produto['precoUnit'] = $_REQUEST['preco-produto'];
    $produto['descricao'] = $_REQUEST['descricao-produto'];

    $produtoController->cadastrar($produto);
    header("Location:adm.php");
}
if (isset($_REQUEST['logout'])) {
    $contaController->logout();
}
if(isset($_REQUEST['remove_email'])){
    $cliente = $_REQUEST['remove_email'];
    $contaController->excluir($cliente);
    header("Location:adm.php");
}
if(isset($_REQUEST['remove_produto'])){
    $produto_id = $_REQUEST['remove_produto'];

    $produtoController->excluir($produto_id);
    header("Location:adm.php");
}
if(isset($_REQUEST['alterProdutoForm'])){
    $produto['id'] = $_REQUEST['produto_id'];
    $produto['nome'] = $_REQUEST['produto_nome'];
    $produto['precoUnit'] = $_REQUEST['produto_preco'];
    $produto['descricao'] = $_REQUEST['produto_descr'];

    $produtoController->alterar($produto);
    header("Location:adm.php");
}


$adm = array(
    'openModal' => $openModal,
    'session' => $_SESSION,
    'clientList' => $cliente,
    'produtoList' => $produto
);

echo $twig->render("adm.html",$adm);