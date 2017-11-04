<?php
/**
 * Created by PhpStorm.
 * User: Rafael Lino
 * Date: 02/11/2017
 * Time: 21:00
 */

namespace src\controller;

use src\model\FactoryConta;
use src\model\Email;
class ValidaConta {

        private $conta= null;

            public function __construct($type='cliente')
            {

                    $this->conta = FactoryConta::construct($type);

            }

    public function Email($email){
            $email = strtolower($email);// lower case
                if($this->validarLogin($email))
                $this->conta->setEmail($email);
            else
                return false;
            return true;
        }

        public function Cpf($cpf){
            if($this->validarCpf($cpf))
                $this->conta->setCpf($cpf);
            else
                return false;
            return true;
        }

    /**
     * @param $nome
     * @return bool
     * Aceita caracteres alpha numéricos
     */
        public function Nome($nome){
            if(preg_match("/[^a-zA-Zà-úÁ-ú0-9]/",$nome)===1){
                return false;
            }
            $nome = strtolower($nome); // converte string para lowerCase
            //ucfirst(); //converte primeira letra para upperCase
            $this->conta->setNome($nome);

            return true;
        }

    /**
     * @param $senha
     * @return bool
     */
        public function Senha($senha){
            if(preg_match("/([^A-Za-z0-9@])/",$senha)===1|| sizeof($senha)< 6){
                return false;
            }
            $senha = trim(strtolower($senha));
            $this->conta->setSenha($senha);
            return true;
        }

    /**
     * @param array $parametros: rua,nº,bairro,cidade,estado
     */
        public function Endereco(...$parametros){
                $string = implode(",",$parametros);
            $this->conta->setEndereco($string);
        }

        public function Telefone($telefone){
               if(preg_match("/([^0-9 )(-])/",$telefone)==1){
                   return false;
               }
                $padrao = array(')','(','-');
                $telefone = trim(str_replace($padrao,"",$telefone)); // retira os caracteres conforme o $padrão
                $this->conta->setTelefone($telefone);
                return true;
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
     * 2.1 - Mesmo Algoritmo utilizando 10 digitos ( 9 + 1ºdigito verificador).
     */
    private function validarCpf($cpf):bool{
        try{
            if(strlen($cpf) != 11){ //se $cpf menor ou maior que 11 digitos - cpf inválido
                throw new \InvalidArgumentException("CPF Inválido");
            }
            $arrayCpf = str_split($cpf);//transforma string em array;
            $nArray = array_slice($arrayCpf,0,9); //quebra array -> @param:array, inicio,tamanho;
            $soma = $this->calculoCpf($nArray);
            $resto = (int)$soma%11;
            $digito = $resto < 2 ? 0 : abs(11-$resto);

            if($digito != $arrayCpf[9]){
                return false;
            }
            else{
                $nArray = array_slice($arrayCpf,0,10);
                $soma = $this->calculoCpf($nArray);
                $resto = (int)$soma%11;
                $digito2 = $resto < 2 ? 0: abs(11-$resto);
            }
            if($digito2 != $arrayCpf[10]){
                return  false;
            }
        }catch (\InvalidArgumentException $e){
           echo "Os digitos do cpf não corresponde a 11";
           return false;
        }
        return true;
    }

    /**
     * @param $array
     * @return int soma
     * Recebe o array de numeros do cpf e a quantidade de digitos para verificação
     * retorna a soma de todos os elementos do array;
     * somente para uso do método validarCpf();
     */
    private function calculoCpf($array):int{
        for($i=sizeof($array)-1,$j=2; $i >= 0;$i--,$j++){
            $array[$i]*=$j;
        }
        return array_sum($array);
    }

    /**
     * @param $email
     * @return boolean
     * Não aceita caracteres especiais
     */
    private function validarLogin($email):bool {
        $valid = false;
        $email = trim($email);
        //se encontrar algum caracter fora do pattern retorna 1
        if(preg_match("/([^A-Za-z0-9@{1}_.-])/",$email)===1){
            return false;
        }
        $email = strstr($email,"@"); //quebra string no "@"
        //substr($email,strpos($email,"@"));
        foreach (Email::getConstants() as $var) {
            if (strcasecmp($email, $var) == 0) { // compara strings e retorna 0:v,1:F(>), -1:F(<)
                $valid = true;
                break;
            }
        }

        return $valid;
    }

    public function getClass(){
        return $this->conta;
    }
}