<?php
/**
 * Created by PhpStorm.
 * User: Rafael Lino
 * Date: 03/11/2017
 * Time: 22:44
 */

namespace src\model;


class DAO_Produto implements DAO
{
    function insert($produto)
    {
        $conexao = DB::getInstance()->getConnection();
        $produto = (object)$produto; // porque php é um bosta

        $arrayConta = $produto->convertToArray();
        $keys = array_keys($arrayConta);

        $place_holders = $this->getPlaceHolders($arrayConta);
        $fields = $this->getFieldsToInsert($keys);

        $query = "INSERT INTO PRODUTO($fields) VALUES ($place_holders)";
        $prepareStatement = $conexao->prepare($query);
        $result = $prepareStatement->execute(array_values($arrayConta));

        DB::getInstance()->shutdown();
        return $result;
    }

    function delete($conta)
    {
        // TODO: Implement delete() method.
    }

    function update($conta)
    {
        // TODO: Implement update() method.
    }

    function select(...$args)
    {
        // TODO: Implement select() method.
    }

    public function selectAll(){
        $conexao = DB::getInstance()->getConnection();
        $query = "SELECT produto.* FROM produto";
        $statement = $conexao->prepare($query);
        $statement->execute();
        $array = $statement->fetchAll(\PDO::FETCH_ASSOC);
        DB::getInstance()->shutdown();
        return $array;
    }

    /**
     * @param array $array
     * @return string
     * Retorna placeholders "?"
     */
    private function getPlaceHolders(array $array):string{
        return implode(',', array_fill(0, count($array), '?'));

    }

    /**
     * @param array $key
     * @return string
     * retorna chaves de um array para os campos de uma Tabela
     */
    private function getFieldsToInsert(array $key):string {
        return '`'.implode('`, `',$key).'`';
    }

    private function getFieldsToSelect(array $key):string{
        return implode('`, `',$key);
    }
}