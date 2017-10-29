<?php
namespace src\model;
//require_once ("DB.php");
require("../../vendor/autoload.php");
          $con = DB::getInstance()->getConnection();
             $result = $con->query("SELECT * FROM usuarios");
            echo ":::";
            $row = $result->fetch(\PDO::FETCH_ASSOC);
                print_r($row);




