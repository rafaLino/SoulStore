<?php
/**
 * Created by PhpStorm.
 * User: Rafael Lino
 * Date: 20/10/2017
 * Time: 01:26
 */

//require_once ('DB.php');
require_once ("DB.php");
use src\model\DB;
          $con = DB::getInstance()->getConnection();
             $result = $con->query("SELECT * FROM usuarios");

            $row = $result->fetch(pdo::FETCH_ASSOC);
                print_r($row);




