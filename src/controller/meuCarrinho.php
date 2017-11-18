<?php
/**
 * Created by PhpStorm.
 * User: Rafael Lino
 * Date: 18/11/2017
 * Time: 11:26
 */

require("../../vendor/autoload.php");

$loader = new \Twig_Loader_Filesystem( __DIR__."/../view");
$twig = new \Twig_Environment($loader);


$arrayCarrinho = array("nome");
echo $twig->render("meuCarrinho.html",$arrayCarrinho);