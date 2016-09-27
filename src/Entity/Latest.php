<?php

namespace TigranMaestro\OpenExchangeRatesPHPClient\Entity;

use TigranMaestro\OpenExchangeRatesPHPClient\Abstracts\Entity;
use TigranMaestro\OpenExchangeRatesPHPClient\Entity\Rate;

/**
 * Class Latest
 * @package Swader\OpenExchangeRatesPHPClient\Entity
 */
class Latest extends Entity
{
    /**
     * @var array
     */
    protected $rates = [];

    /**
     * Latest constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        foreach ($this->data['rates'] as $currencyCode => $rate) {
            $this->rates[] = new Rate($currencyCode, $rate);
        }
        $this->data['rates'] = $this->rates;
        unset($this->rates);
    }

    /**
     * Provides the time (UNIX) that the rates were published
     * @return int
     */
    public function getTimestamp()
    {
        return intval($this->data['timestamp']);
    }

    /**
     * Provides the 3-letter currency code to which all the delivered exchange rates are relative
     * @return string
     */
    public function getBase()
    {
        return $this->data['base'];
    }

    /**
     * Returns an array of rates
     * Each rate is a Rate entity.
     *
     * @see Rate
     * @return array
     */
    public function getRates()
    {
        return $this->rates;
    }
}