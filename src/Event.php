<?php

namespace Zbxin\Contracts;

use Illuminate\Queue\SerializesModels;

abstract class Event extends Attributes
{
    use SerializesModels;

    /**
     * @return array
     */

    abstract protected function attributeMap();

    /**
     * @var array|mixed[]
     */

    public $initParams;

    /**
     * Event constructor.
     * @param mixed ...$parameters
     */

    public function __construct(...$parameters)
    {
        foreach ($this->attributeMap() as $key => $attribute) {
            if (isset($parameters[$key])) {
                $this->setAttribute($attribute, $parameters[$key]);
                unset($parameters[$key]);
            }
        }
        $this->initParams = $parameters;
        parent::__construct([]);
    }
}
