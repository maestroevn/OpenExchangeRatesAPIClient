
<?php

namespace TigranMaestro\OpenExchangeRatesPHPClient\Traits;

use TigranMaestro\OpenExchangeRatesPHPClient\Wrapper;

/**
 * Class WrapperAware
 * @property Wrapper wrapper
 * @package TigranMaestro\OpenExchangeRatesPHPClient\Traits
 */
trait WrapperAware
{
    /**
     * Sets the Wrapper instance on the child class
     * Used to later fetch the token, HTTP client, EntityFactory, etc
     * @param Wrapper $wrapper
     * @return $this
     */
    public function registerWrapper(Wrapper $wrapper)
    {
        $this->wrapper = $wrapper;
        return $this;
    }
}