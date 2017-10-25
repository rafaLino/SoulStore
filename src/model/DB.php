<?php
/**
 * Created by PhpStorm.
 * User: Rafael Lino
 * Date: 19/10/2017
 * Time: 20:56
 */


namespace src\model;
class DB
{
        private static  $instance = null;
        private $clients;
        private $file;
        private $connection = null;

            private function __construct(){
                try {
                    $this->file = fopen(__DIR__."/../../db.properties", 'r');
                }catch (\Exception $e) {
                    echo "arquivo não aberto";
                }
                    $server = $this->getPropertie('servername');
                    $user = $this->getPropertie('user');
                    $password = $this->getPropertie('password');
                    $banco = $this->getPropertie('database');

                    $this->connection = new \PDO("mysql:host=$server;dbname=$banco",$user,$password);
                    //$this->connection = mysqli_connect($server,$user,$password);
            }

                public static function getInstance():DB {
                if(DB::$instance == null) {
                    DB::$instance = new DB();
                }
                    return DB::$instance;

                }

                public function getConnection(){
                    if($this->connection == null){
                        throw new \Exception("No Connection");
                    }
                    $this->clients++;
                    echo "connected!";
                    return $this->connection;
                }

                public function shutdown(){
                    $this->clients--;
                    if($this->clients>0){return;}
                    try{
                        mssql_close($this->connection);
                        DB::$instance = null;
                        $this->connection =null;
                        echo"Connection Closed";
                    }catch (\Exception $e){
                        $e->getMessage();
                    }
                }
                public static function get(){
                    return var_dump(DB::$instance);
                }


        private function getPropertie($string):string{
            while(!feof($this->file)){
                $line = fgets($this->file);
                if(substr_count($line,$string)>0){ break;}
            }
            if (!is_bool(strpos($line, ':')))
                return trim(substr($line, strpos($line,":")+strlen(":")));
    }

}