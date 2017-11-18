<?php
/**
 * Created by PhpStorm.
 * User: Rafael Lino
 * Date: 03/11/2017
 * Time: 23:14
 */

namespace src\model;


interface DAO
{
    function insert(Conta $conta);
    function delete($conta);
    function update($conta,$args,$values);
    function select($conta,...$args);
}