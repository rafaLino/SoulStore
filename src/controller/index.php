<?php

require("../../vendor/autoload.php");


if(isset($_REQUEST['recSenhaForm'])){
    $email = $_REQUEST['confirmEmail'];
    echo "<script>alert('" . $email . "')</script>";
}
$openConta = array('open'=>"#loginModal");
$loader = new Twig_Loader_Filesystem( __DIR__."/../view");
$twig = new Twig_Environment($loader);

if(isset($_SESSION['login'])){
    $openConta['open']="#recoverSenha";
}
   echo $twig->render("index.twig", $openConta);

