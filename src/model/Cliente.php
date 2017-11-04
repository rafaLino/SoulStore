<?php
/**
 * Created by PhpStorm.
 * User: Rafael Lino
 * Date: 02/11/2017
 * Time: 12:42
 */

namespace src\model;


class Cliente extends Conta{

    public function desativar(){
            if($this->isAtivo()){
                $this->ativo = false;
            }
        }

}