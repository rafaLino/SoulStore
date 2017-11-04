<?php
/**
 * Created by PhpStorm.
 * User: Rafael Lino
 * Date: 03/11/2017
 * Time: 22:43
 */

namespace src\model;
 /** TODO: SQL comands;*/

class DAO_Conta implements DAO
{
    private $connection = null;

    public function insert($conta){
        $this->connection = DB::getInstance()->getConnection();
        $sql = 'COMANDO SQL';
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        DB::getInstance()->shutdown(); // disconnect
    }

    function delete($conta)
    {
        // TODO: Implement delete() method.
    }

    function update($conta, ...$args)
    {
        // TODO: Implement update() method.
    }

    function select($conta, ...$args)
    {
        // TODO: Implement select() method.
    }
}