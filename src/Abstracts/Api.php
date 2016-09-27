<?php

namespace TigranMaestro\OpenExchangeRatesPHPClient\Abstracts;

use TigranMaestro\OpenExchangeRatesPHPClient\Wrapper;
use TigranMaestro\OpenExchangeRatesPHPClient\Traits\WrapperAware;

/**
 * Class Api
 * @package TigranMaestro\OpenExchangeRatesPHPClient\Abstracts
 */
abstract class Api implements \TigranMaestro\OpenExchangeRatesPHPClient\Interfaces\Api
{
    /** @var string API URL to which to send the request */
    protected $apiUrl;

    /** @var array Settings on which optional fields to fetch */
    protected $fieldSettings = [];

    /** @var array Other API specific options */
    protected $otherOptions = [];

    /** @var  Wrapper The parent class which spawned this one */
    protected $wrapper;

    use WrapperAware;

    public function __construct()
    {

    }

    /**
     * @return string
     */
    public function buildUrl()
    {
        $url = rtrim($this->apiUrl, '/') . '?';

        // Add Token
        $url .= 'app_id=' . $this->wrapper->getAppId();

        // Add Other Options
        foreach ($this->otherOptions as $option => $value) {
            $url .= '&' . $option . '=' . $value;
        }

        return $url;
    }
}