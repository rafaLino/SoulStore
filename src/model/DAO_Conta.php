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
        $conexao = DB::getInstance()->getConnection();
            $conta = (object)$conta; // porque php é um bosta

        $arrayConta = $conta->convertToArray();
        $keys = array_keys($arrayConta);

        $place_holders = $this->getPlaceHolders($arrayConta);
        $fields = $this->getFieldsToInsert($keys);

        $query = "INSERT INTO CONTA($fields) VALUES ($place_holders)";
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
        $conexao = DB::getInstance()->getConnection();
        $email=$conta->getEmail();
        $array = array('Rafael', '654321','rua rafael da silva','11564265874');
        $query = "UPDATE conta SET nome = ?, senha = ?, endereco = ?, telefone = ?  WHERE email='$email'";
        $exec = $conexao->prepare($query);
        $exec->execute($array);
        DB::getInstance()->shutdown();
        $conexao=null;
    }

    function select(...$args)
    {
        $conexao = DB::getInstance()->getConnection();
        $fields = $this->getFields($args);

        $query = "SELECT $fields FROM conta";
        $statement = $conexao->prepare($query);
        $statement->execute();

        DB::getInstance()->shutdown();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    function selectAll(){
        $conexao = DB::getInstance()->getConnection();
        $query = "SELECT conta.* FROM conta JOIN administrador ON conta.email != administrador.email";
        $statement = $conexao->prepare($query);
        $statement->execute();
        $array = $statement->fetchAll(\PDO::FETCH_ASSOC);
        DB::getInstance()->shutdown();
        return $array;
    }

    /**
     * @param $email
     * @return bool|mixed
     * retorna conta
     */
    public function selectConta($email,$senha){
            $res = false;
            $conexao = DB::getInstance()->getConnection();

            $query="SELECT * FROM CONTA WHERE email='".$email."' AND senha='".$senha."'";
            $prepareStatement = $conexao->prepare($query);
            $prepareStatement->execute();
            $res = $prepareStatement->fetchObject("src\model\Conta");

            DB::getInstance()->shutdown();

            return $res;
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