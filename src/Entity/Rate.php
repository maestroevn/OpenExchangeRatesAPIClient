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
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);

        $keys = array_keys($data);
        $currencyCode = $keys[0];

        $this->data['currency_code'] = $currencyCode;
        $this->data['rate'] = $data[$currencyCode];
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