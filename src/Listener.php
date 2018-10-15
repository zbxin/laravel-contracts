<?php

namespace ZhiEq\Contracts;

abstract class Listener
{
    /**
     * @param $event
     * @return boolean|string|array
     */

    abstract public function handle($event);

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