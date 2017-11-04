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
    function insert($conta);
    function delete($conta);
    function update($conta,...$args);
    function select($conta,...$args);
}