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
use src\model\Administrador;
use src\model\FactoryConta;

class ContaController
{

    public function cadastrar($pessoa){

        $conta = new Cliente();
            $validar = new ValidarConta($conta);
            $validar->Email($pessoa['email']);
            $validar->Nome($pessoa['nome']);
            $validar->Senha($pessoa['senha']);

            $daoConta = new DAO_Conta();
             $result = $daoConta->insert($conta);
             $this->logar($conta->getEmail(),$conta->getSenha());
            return $result;
    }
    public function excluir($id){
        $dao = new DAO_Conta();
        $result=  $dao->delete($id);
        $dao = null;
        return $result;
    }
    public function alterar($pessoa){
        $conta = new Cliente();
        $validar = new ValidarConta($conta);
        $validar->Email($pessoa['email']);
        $validar->Nome($pessoa['nome']);
        $validar->Senha($pessoa['senha']);

        $daoConta = new DAO_Conta();
        $result = $daoConta->update($conta);
        $daoConta=null;
        return $result;
    }

    public function logar($email,$senha){
               $conta = null;
               $dao = new DAO_Conta();
                $conta =(object)$dao->selectConta($email,$senha);
                   if ($conta != null){
                       $_SESSION['login']= $conta->getNome();
                       return true;

                   } else {
                       return false;
                  }

    }

    public static function getModaltoOpen(){
       // $openConta = array('modal' => "#loginModal");
        if (isset($_SESSION['login'])) {
            $usuario = $_SESSION['login'];
            if (strcasecmp($usuario,"admin")==0) {
                return "../view/adm.php";
            } else {
                return  "../view/meuCarrinho.php";
            }
        }
        return "#loginModal";
    }

    public function resetSenha($email){
             $sendEmail = new sendEmail();
             $sendEmail->recuperarSenha($email);
             $sendEmail=null;
            header("Location:index.php");

    }


    private function buscarEmail($email):bool{
        $dao = new DAO_Conta();
        $arrayConta = $dao->select($email);
        $resultado = false;
        if(!$arrayConta)
            return $resultado;

        foreach ($arrayConta as $var){
            if(strcasecmp($var['email'],$email)){
                $resultado = true;
                break;
            }
        }
        return $resultado;
}

    public function logout(){
        session_destroy();
        $_SESSION['login']=null;
        header("Location:index.php");

    }

public function getAll(){
        $dao = new DAO_Conta();
        $result = $dao->selectAll();
            $dao = null;
             return $result;
}
}