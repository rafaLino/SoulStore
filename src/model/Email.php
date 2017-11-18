<?php
/**
 * Created by PhpStorm.
 * User: Rafael Lino
 * Date: 02/11/2017
 * Time: 19:43
 */

namespace src\model;


abstract  class Email {
    const gmail = "@gmail.com";
    const hotmail ="@hotmail.com";
    const outlook = "@outlook.com";
    const yahoo = "@yahoo.com";
    const fatec = "@fatec";
    const adm = "@adm"; //just for admin

    private static $constCacheArray = null;
   /**
    * returns all consts as an array
    * @see search for \SplEnum in php.net
   */
    public static function getConstants() {
        /** se $constCacheArray null, inicia array*/
        if (self::$constCacheArray === null) self::$constCacheArray = array();
         /**
          * get_called_class() retorna nome da classe que chamou o método estático.
          */
        $calledClass = get_called_class();
        /**
         * retorna true se a key passada como parametro existe no array
         * no caso: lê-se 'se não existir a key no array $constCacheArray'.
        */
        if (!array_key_exists($calledClass, self::$constCacheArray)) {
            /**
             * Instancia de objeto ReflectionClass().
             * ReflectionClass retorna todas as informações da classe passada como parametro
             */
            $reflect = new \ReflectionClass($calledClass);
            /**
             * método getConstants retorna array contendo as constantes da classe;
             */
            self::$constCacheArray[$calledClass] = $reflect->getConstants();
        }
        return self::$constCacheArray[$calledClass];
    }


}