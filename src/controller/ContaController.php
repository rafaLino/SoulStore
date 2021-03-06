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
        $this->logout();
    }
    public function alterar($pessoa){
        $conta = new Conta();
        $conta->setNome($pessoa['nome']);
        $conta->setSenha($pessoa['senha']);
        $conta->setEndereco($pessoa['endereco']);
        $conta->setTelefone($pessoa['telefone']);

        $daoConta = new DAO_Conta();
        $result = $daoConta->update($conta);
        if($result)
            $_SESSION['login'] = $conta;
        $daoConta=null;
        return $result;
    }

    public function logar($email,$senha){

               $dao = new DAO_Conta();
                $conta = $dao->selectConta($email,$senha);
                   if ($conta){
                       $_SESSION['login']= $conta;
                       //$_SESSION['nome']= $conta->getNome();
                       return true;

                   } else {
                       $_SESSION['login'] = null;
                  }

    }

    public static function getModaltoOpen(){
       // $openConta = array('modal' => "#loginModal");
        if (isset($_SESSION['login'])) {
             $usuario = $_SESSION['login'];
            //if (strcasecmp($usuario,"admin")==0)
            if($usuario instanceof  Administrador){
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
        session_start();
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
