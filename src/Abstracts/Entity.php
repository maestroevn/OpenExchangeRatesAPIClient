<?php

namespace TigranMaestro\OpenExchangeRatesPHPClient\Abstracts;

/**
 * Class Entity
 * @package TigranMaestro\OpenExchangeRatesPHPClient\Abstracts
 */
abstract class Entity
{
    /** @var array */
    protected $data;

    /**
     * Entity constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Returns the original response that was passed into the Entity
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param $name
     * @return mixed|null
     */
    public function __get($name)
    {
        return (isset($this->data[$name])) ? $this->data[$name] : null;
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed|null
     */
    public function __call($name, $arguments)
    {
        $isGetter = substr($name, 0, 3) == 'get';
        if ($isGetter) {
            $property = lcfirst(substr($name, 3, strlen($name) - 3));
            return $this->$property;
        }
        throw new \BadMethodCallException('No such method: '.$name);
    }
}