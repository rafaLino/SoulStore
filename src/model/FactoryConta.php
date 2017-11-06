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
    const Administrador = 0;
    const Cliente = 1;
    /**
     * FactoryConta verifica as constantes definidas e instancia classe conforme parêmetro.
     * @param $type
     * @return Conta
     * @default cliente
     * @note: Instancia Apenas Classes com  o mesmo namespace que FactoryConta
     */
        public static function construct($type){
            $class = get_called_class(); // pega FactoryConta
            $reflect = new \ReflectionClass($class); // Recebe todas as informações de FactoryConta
            $className = $reflect->getNamespaceName()."\\"; //Prepara $className com namespace;
            $keys = array_keys($reflect->getConstants()); // recebe valores das keys do array de constantes;
           try{
                 foreach ($keys as $var) {
                    if (strcasecmp($type, $var) == 0){ //quando achar o tipo correspondente à constante
                        $className .=$var; // concantena o tipo junto ao namespace.
                        break;
                    }
                 }

           }catch (\Error $e){ //Se tipo não encontrado ou digitado incorretamente.
               echo "Tipo de Conta inválida";
               die;
              }

            return new $className(); //instancia a classe

        }
}