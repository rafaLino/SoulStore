<?php
/**
 * Created by PhpStorm.
 * User: Rafael Lino
 * Date: 03/11/2017
 * Time: 22:44
 */

namespace src\model;


class DAO_Produto
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
        $conexao = DB::getInstance()->getConnection();
        $query = "DELETE FROM PRODUTO WHERE id='$conta'";

        $prepare = $conexao->prepare($query);
        $result = $prepare->execute();
        DB::getInstance()->shutdown();
        return $result;
    }

    function update(Produto $conta)
    {
        $conexao = DB::getInstance()->getConnection();
        $array = $conta->convertToArray();
        $id = $array['id'];
        unset($array['id']);

        $query = "UPDATE PRODUTO SET `nome` = ?, `precoUnit` = ?, `descricao` = ? WHERE `id` = $id";
        $prepare = $conexao->prepare($query);
        $prepare->bindParam(1,$array['nome']);
        $prepare->bindParam(2,$array['precoUnit']);
        $prepare->bindParam(3,$array['descricao']);

        $result = $prepare->execute();
        DB::getInstance()->shutdown();
        $conexao = null;
        return $result;
    }

    function select(...$args)
    {
        $conexao = DB::getInstance()->getConnection();
        $fields = $this->getFieldsToSelect($args);

        $query = "SELECT $fields FROM PRODUTO";
        $statement = $conexao->prepare($query);
        $statement->execute();

        DB::getInstance()->shutdown();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
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