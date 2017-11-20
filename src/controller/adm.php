<?php

namespace src\controller;
require("../../vendor/autoload.php");
$loader = new \Twig_Loader_Filesystem( __DIR__."/../view");
$twig = new \Twig_Environment($loader);


$_SESSION['login'];

$openConta['modal'] = $contaController->getModaltoOpen();


$adm = array(
    'open' => $openConta,
    'session' => $_SESSION
);

echo $twig->render("adm.html",$adm);