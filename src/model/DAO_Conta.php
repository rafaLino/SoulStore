<?php
/**
 * Created by PhpStorm.
 * User: Rafael Lino
 * Date: 03/11/2017
 * Time: 22:43
 */

namespace src\model;
 /** TODO: SQL comands;*/

class DAO_Conta
{
    private $connection = null;

    public function insert($conta){
        $conexao = DB::getInstance()->getConnection();
            $conta = (object)$conta; // porque php é um bosta

        $arrayConta = $conta->convertToArray();
        $keys = array_keys($arrayConta);

        $place_holders = $this->getPlaceHolders($arrayConta);
        $fields = $this->getFieldsToInsert($keys);

        $query = "INSERT INTO soulstore.CONTA($fields) VALUES ($place_holders)";
        $prepareStatement = $conexao->prepare($query);
        $result = $prepareStatement->execute(array_values($arrayConta));

        DB::getInstance()->shutdown();
        return $result;
 }

    function delete($conta)
    {
        $result = 0;
        $conexao = DB::getInstance()->getConnection();
        $query = "DELETE FROM soulstore.CONTA WHERE conta.email='$conta'";

        $prepare = $conexao->prepare($query);
        $result = $prepare->execute();
        DB::getInstance()->shutdown();
        return $result;

    }

    function update(Conta $conta)
    {

        $conexao = DB::getInstance()->getConnection();
        $array = $conta->convertToArray();
        $email= $conta->getEmail();
        $query = "UPDATE soulstore.conta SET `nome` = :nome, `senha` = :senha, `endereco` = :endereco, `telefone` = :telefone  WHERE `email`=$email";
        $prepare = $conexao->prepare($query);
        $prepare->bindParam(':nome',$array['nome']);
        $prepare->bindParam(':senha',$array['senha']);
        $prepare->bindParam(':endereco',$array['endereco']);
        $prepare->bindParam(':telefone',$array['telefone']);
       $result =  $prepare->execute();
        DB::getInstance()->shutdown();
        $conexao=null;
        return $result;
    }

    function select(...$args)
    {
        $conexao = DB::getInstance()->getConnection();
        $fields = $this->getFieldsToSelect($args);

        $query = "SELECT $fields FROM soulstore.conta";
        $statement = $conexao->prepare($query);
        $statement->execute();

        DB::getInstance()->shutdown();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    function selectAll(){
        $array = 0;
        $conexao = DB::getInstance()->getConnection();
        $query = "SELECT conta.* FROM soulstore.conta JOIN soulstore.administrador ON soulstore.conta.email != soulstore.administrador.email";
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
            $res = 0;
            $conexao = DB::getInstance()->getConnection();

            $queryAdm ="SELECT conta.* FROM CONTA JOIN ADMINISTRADOR ON conta.email = administrador.email WHERE conta.email='".$email."' AND conta.senha='".$senha."'";
            $queryCli="SELECT conta.* FROM CONTA JOIN ADMINISTRADOR ON conta.email != administrador.email  WHERE conta.email='".$email."' AND conta.senha='".$senha."'";

            $prepareStatement = $conexao->prepare($queryAdm);
            $prepareStatement->execute();

            if($prepareStatement->rowCount() > 0) {
                $res = $prepareStatement->fetchObject("src\model\Administrador");
            }
            else{
                $prepareStatement = $conexao->prepare($queryCli);
                $prepareStatement->execute();
                 if($prepareStatement->rowCount()> 0 ) {
                     $res = $prepareStatement->fetchObject("src\model\Cliente");
                }
            }
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