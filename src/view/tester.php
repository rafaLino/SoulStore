<?php

namespace src\view;

use src\controller\CadastroController;
use src\controller\ContaController;
use src\controller\ProdutoController;
use src\controller\ValidarConta;
use src\model\Administrador;
use src\model\Cliente;
use src\model\DAO_Conta;
use src\model\DAO_Produto;
use src\model\FactoryConta;
use src\model\DB;
use src\model\Produto;


require_once ("../../vendor/autoload.php");


$pessoa['email'] = $_REQUEST['alterContaForm'];
$pessoa['outro'] = $_REQUEST['cliente_email'];
$pessoa['nome'] = $_REQUEST['cliente_nome'];
print_r($pessoa);





















