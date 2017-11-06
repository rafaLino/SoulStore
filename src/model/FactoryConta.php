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
     const ADMINISTRADOR = 0;
     const CLIENTE = 1;

    /**
     * FactoryConta verifica as constantes definidas e instancia classe conforme parâmetro.
     * @param $constant
     * @return Conta
     * @note: Instancia Apenas Classes com  o mesmo namespace que FactoryConta
     */
        public static function construct($constant):Conta{
            $reflect = new \ReflectionClass(get_called_class()); // Recebe todas as informações de FactoryConta
            $className = $reflect->getNamespaceName()."\\"; //Prepara $className com namespace;
            $array = $reflect->getConstants(); //recebe array de constantes;
            $key = array_keys($array);// recebe key do array
           try{
                 foreach($array as $var) {
                    if ($constant == $var ){ //quando achar o tipo correspondente à constante
                        $className .=$key[$var]; // concantena o tipo junto ao namespace.
                        break;
                    }
                 }

           }catch (\Error $e){ //Se tipo não encontrado ou digitado incorretamente.
               echo "Tipo de Conta inválida";
               die;
              }
            return new $className; //retorna instancia a classe
        }
}