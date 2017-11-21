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

}


$adm = array(
    'openModal' => $openModal,
    'session' => $_SESSION,
    'clientList' => $cliente,
    'produtoList' => $produto
);

echo $twig->render("adm.html",$adm);