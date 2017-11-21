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
$carrinho = array(
    'openModal' => $openModal,
    'session' => $_SESSION,

);
echo $twig->render("meuCarrinho.html",$carrinho);