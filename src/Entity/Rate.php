<?php

namespace TigranMaestro\OpenExchangeRatesPHPClient\Entity;

use TigranMaestro\OpenExchangeRatesPHPClient\Abstracts\Entity;

/**
 * Class Rate
 * @package TigranMaestro\OpenExchangeRatesPHPClient\Entity
 */
class Rate extends Entity
{
    /**
     * Rate constructor.
     * @param string $currencyCode
     * @param double $rate
     */
    public function __construct($currencyCode, $rate)
    {
        parent::__construct([]);
        $this->data['currency_code'] = $currencyCode;
        $this->data['rate'] = $rate;
    }

    /**
     * @return string
     */
    public function getRate()
    {
        return $this->data['rate'];
    }

    /**
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->data['currency_code'];
    }
}