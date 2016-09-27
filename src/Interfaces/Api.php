<?php

namespace TigranMaestro\OpenExchangeRatesPHPClient\Interfaces;

use TigranMaestro\OpenExchangeRatesPHPClient\Abstracts\Entity;

/**
 * Interface Api
 * @package TigranMaestro\OpenExchangeRatesPHPClient\Interfaces
 */
interface Api
{
    /**
     * @return Entity
     */
    public function call();

    /**
     * @return string
     */
    public function buildUrl();
}