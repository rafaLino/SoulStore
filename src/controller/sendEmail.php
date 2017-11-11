<?php
/**
 * Created by PhpStorm.
 * User: Rafael Lino
 * Date: 10/11/2017
 * Time: 23:17
 */

namespace src\controller;


use src\model\DAO_Conta;

class sendEmail
{
    public function recuperarSenha($email){
        $dao = new DAO_Conta();
        $conta = $dao->select($email);
        $email = trim($email);
        if($conta->getEmail()==$email){
            $new =$this->randString(12);
            $dao->update($conta,'senha',$new);
            $mensagem = '
                    <html>
                    <body>
                    Uma nova Senha foi Solicitada,
                    <br>Por favor, altere assim que possível
                    <br>Sua Nova <strong>Senha:</strong>'.$new.
                   '<br> Caso Você não tenha solicitado uma nova senha<br>
                   Desconsidere este email
                   </body>
                   </html>';

            $newMensagem= wordwrap($mensagem);
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
           mail($email,"SoulStore - Senha Solicitada",$newMensagem,$headers);
        }
    }

    private function randString($size){
        //String com valor possíveis do resultado, os caracteres pode ser adicionado ou retirados conforme sua necessidade
        $basic = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

        $return= "";

        for($count= 0; $size > $count; $count++){
            //Gera um caracter aleatorio
            $return.= $basic[rand(0, strlen($basic) - 1)];
        }
        return $return;
    }
}