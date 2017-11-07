<?php
/**
 * Created by PhpStorm.
 * User: Rafael Lino
 * Date: 02/11/2017
 * Time: 12:54
 */

namespace src\model;


class Carrinho{

        private $date;
        private $valorTotal;
        private $pagamento = null;//tipo PAGAMENTO
    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }
    /**
     * @return mixed
     */
    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    /**
     * @param mixed $valorTotal
     */
    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;
    }

    /**
     * @return Pagamento
     */
    public function getPagamento():Pagamento
    {
        return $this->pagamento;
    }

    /**
     * @param mixed $pagamento
     */
    public function setPagamento($pagamento)
    {
        $this->pagamento = $pagamento;
    }

}