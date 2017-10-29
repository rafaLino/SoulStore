<?php
namespace src\model;
//require_once ("DB.php");
include("../../vendor/autoload.php");
          $con = DB::getInstance()->getConnection();
             $result = $con->query("SELECT * FROM usuarios");

            $row = $result->fetch(pdo::FETCH_ASSOC);
                print_r($row);




