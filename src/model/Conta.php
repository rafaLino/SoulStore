<?php
/**
 * Created by PhpStorm.
 * User: Rafael Lino
 * Date: 02/11/2017
 * Time: 12:23
 */

namespace src\model;


abstract class Conta //implements ContaSkeleton
{
    protected $cpf;
    protected $nome;
    protected $email;
    protected $senha;
    protected $endereco;
    protected $telefone;

    /**
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf)
    {
        $istrue= $this->validarCpf($cpf);
        if($istrue)
            $this->cpf=$cpf;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    /**
     * @return string
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    /**
     * @return string
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    /**
     @param $cpf
     @return boolean
     *Algoritmo para validação do cpf
     * 1 - calcula o 1ºdigito verificador a partir dos 9 primeiros digitos do cpf
     * 2 - calcula o 2ºdigito verificador a partir dos 9 +1(1ºdigito verificador) primeiros digitos do cpf
     * 1.1 - Multiplica cada um dos 9 digitos, da direita para a esquerda, por numeros crescentes a partir do 2.
     * 1.2 - Soma os resultado
     * 1.3 - Se o Resto da divisão da soma por 11 for menor que 2,
     * O 1ºDigito verificador deve ser 0.
     * Se não, o 1ºdigito é o número 11 subtraído pelo resto.
     *2.1 - Mesmo Algoritmo mas utilizando os 9 digitos mais o 1ºdigito verificador.
     */
    public function validarCpf($cpf){
        if(strlen($cpf) != 11){ //se $cpf menor ou maior que 11 digitos - cpf inválido
            echo "cpf inválido";
            //throw new \Exception("CPF Inválido");
        }
        $arrayCpf = str_split($cpf);//transforma string em array;
        $nArray = array_slice($arrayCpf,0,9);
        $soma = $this->calculoCpf($nArray);
        $resto = (int)$soma%11;
        $digito = $resto < 2 ? 0 : abs(11-$resto);

            if($digito != $arrayCpf[9]){
                echo "cpf inválido";
               return false;
            }
            else{
             $nArray = array_slice($arrayCpf,0,10);
            $soma = $this->calculoCpf($nArray);
            $resto = (int)$soma%11;
            $digito2 = $resto < 2 ? 0: abs(11-$resto);
            }
            if($digito2 != $arrayCpf[10]){
                echo "cpf inválido";
                return  false;
            }
        return true;
    }

    /**
     * @param $cpf
     * @return int
     * Recebe o array de numeros do cpf e a quantidade de digitos para verificação
     * retorna a soma de todos os elementos do array;
     */
    private function calculoCpf($cpf):int{
        $array = $cpf;
        for($i=sizeof($array)-1,$j=2; $i >= 0;$i--,$j++){
            $array[$i]*=$j;
        }
        return array_sum($array);
    }


    public function validarLogin()
    {
        // TODO: Implement validarLogin() method.
    }


}