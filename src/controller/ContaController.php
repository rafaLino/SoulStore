<?php
/**
 * Created by PhpStorm.
 * User: Rafael Lino
 * Date: 18/11/2017
 * Time: 13:05
 */

namespace src\controller;
use src\model\Cliente;
use src\model\DAO_Conta;
use src\model\Conta;
use src\model\FactoryConta;

class ContaController
{

    public function cadastrar($pessoa){

            $conta = FactoryConta::construct(FactoryConta::CLIENTE);
            $validar = new ValidarConta($conta);
            $validar->Email($pessoa['nome']);
            $validar->Nome($pessoa['email']);
            $validar->Senha($pessoa['senha']);

            $daoConta = new DAO_Conta();
             $daoConta->insert($conta);
             if($daoConta){
                 $this->logar($conta->getEmail(),$conta->getSenha());
             }
}

    public function logar($email,$senha){
        try {
                $log = true;
                $conta = $this->buscarEmail($email);
                   if (strcmp($conta->getSenha(), $senha)){
                       $_SESSION['login'] = $conta;
                       header("Location:index.php");
                   } else {
                       $log = false;
                   }
            }catch (\Exception $e){
                return false;
            }
            return $log;
    }

    public  function getModaltoOpen(){
       // $openConta = array('modal' => "#loginModal");

        if (isset($_SESSION['login'])) {
            $usuario = (object)$_SESSION['login'];
            if ($usuario->isAdmin()) {
                return "adm.php";
            } else {
                return  "meuCarrinho.php";
            }
        }
        return "#loginModal";
    }

    public function resetSenha($email){
             $sendEmail = new sendEmail();
             $sendEmail->recuperarSenha($email);
            header("Location:index.php");

    }


    private function buscarEmail($email){
        $dao = new DAO_Conta();
        $conta = $dao->select($email);

        if($conta == null) {
            return false;
        }
        return $conta;

}
}