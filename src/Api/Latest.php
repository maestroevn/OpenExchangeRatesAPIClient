<?php
namespace TigranMaestro\OpenExchangeRatesPHPClient\Api;

use TigranMaestro\OpenExchangeRatesPHPClient\Abstracts\Api;

/**
 * Class Latest
 *
 * Get the latest exchange rates available from the Open Exchange Rates API.
 * @see https://docs.openexchangerates.org/docs/latest-json
 *
 * @package TigranMaestro\OpenExchangeRatesPHPClient\Api
 */
class Latest extends Api
{
    /** @var string API URL to which to send the request */
    protected $apiUrl = 'https://openexchangerates.org/api/latest.json';


    /**
     * @return \TigranMaestro\OpenExchangeRatesPHPClient\Entity\Latest
     */
    public function call()
    {
        $response = $this->wrapper->getHttpClient()->get($this->buildUrl());
        $arr = json_decode($response->getBody(), true, 512, 1);

        $entity = new \TigranMaestro\OpenExchangeRatesPHPClient\Entity\Latest($arr);

        return $entity;
    }

    /**
     * @param string $baseCurrency international-standard 3-letter ISO currency code
     * @return $this
     */
    public function setBaseCurrency($baseCurrency)
    {
        $this->otherOptions['base'] = $baseCurrency;
        return $this;
    }

    /**
     * @param array $symbols array of international-standard 3-letter ISO currency codes
     * @return $this
     */
    public function setSymbols($symbols = [])
    {
        $symbolsString = implode(',', $symbols);
        $this->otherOptions['symbols'] = $symbolsString;
        return $this;
    }
}