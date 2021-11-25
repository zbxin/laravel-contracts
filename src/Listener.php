<?php

namespace Zbxin\Contracts;

abstract class Listener
{

    /**
     * @return integer
     */

    abstract public function order();

    /**
     * @return int
     */

    public static function getListenOrder()
    {
        return (new static())->order();
    }
}