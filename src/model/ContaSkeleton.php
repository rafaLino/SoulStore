<?php
/**
 * Created by PhpStorm.
 * User: Rafael Lino
 * Date: 02/11/2017
 * Time: 12:31
 */

namespace src\model;


interface ContaSkeleton
{
    function incluir();
    function excluir();
    function alterar();
    function localizar();
    function validarCpf($number);
    function validarLogin();
}