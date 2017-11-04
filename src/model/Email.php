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

    private static $constCacheArray = null;
   /**
    * returns all consts as an array
    * @see search for \SplEnum in php.net
   */
    public static function getConstants() {
        if (self::$constCacheArray === null) self::$constCacheArray = array();
        $calledClass = get_called_class();
        if (!array_key_exists($calledClass, self::$constCacheArray)) {
            $reflect = new \ReflectionClass($calledClass);
            self::$constCacheArray[$calledClass] = $reflect->getConstants();
        }
        return self::$constCacheArray[$calledClass];
    }


}