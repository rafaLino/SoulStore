<?php
/**
 * Created by PhpStorm.
 * User: Rafael Lino
 * Date: 03/11/2017
 * Time: 15:29
 */

namespace src\model;


class FactoryConta
{

    /**
     * FactoryConta static constructor.
     * @param $type 'administrador' or 'cliente'
     * @return $conta adm ou cli
     * @default cliente
     */
        public static function construct($type){
        $conta = null;
        switch($type){
            case strcasecmp($type,"administrador")==0:
            case strcasecmp($type,"admin")==0:
                $conta = new Administrador();
                break;
            case strcasecmp($type,'cliente')==0:
                $conta = new Cliente();
                break;
        }
        return $conta;
        }
}