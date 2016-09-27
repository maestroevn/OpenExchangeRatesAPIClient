<?php

namespace TigranMaestro\OpenExchangeRatesPHPClient\Interfaces;

//use Swader\Diffbot\Entity\EntityIterator;

interface Api
{
    /**
     * @return EntityIterator
     */
    public function call();

    /**
     * @return string
     */
    public function buildUrl();
}