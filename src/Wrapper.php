<?php

namespace TigranMaestro\OpenExchangeRatesPHPClient;

use GuzzleHttp\Client;
use TigranMaestro\OpenExchangeRatesPHPClient\Abstracts\Entity;
use TigranMaestro\OpenExchangeRatesPHPClient\Api\Latest;
use TigranMaestro\OpenExchangeRatesPHPClient\Exceptions\ClientException;

/**
 * Class Wrapper
 *
 * The main class for API consumption
 *
 * @package TigranMaestro\OpenExchangeRatesPHPClient
 */
class Wrapper
{
    /** @var string app ID */
    private static $appId = null;

    /** @var string instance app ID, settable once per new instance */
    private $instanceAppId;

    /** @var Client The HTTP clients to perform requests with */
    protected $client;

    /** @var Entity */
    protected $entity;

    /**
     * @param string|null $appId app ID, as obtained on https://docs.openexchangerates.org/
     * @throws ClientException When no token is provided
     */
    public function __construct($appId = null)
    {
        if ($appId === null) {
            if (self::$appId === null) {
                $msg = 'No app ID provided, and none is globally set. ';
                $msg .= 'Use Wrapper::setToken, or instantiate the Wrapper class with a $appId parameter.';
                throw new ClientException($msg);
            }
        } else {
            self::validateAppId($appId);
            $this->instanceAppId = $appId;
        }
    }

    /**
     * Sets the app ID for all future new instances
     * @param $appId string app ID, as obtained on https://docs.openexchangerates.org/
     * @return void
     */
    public static function setAppId($appId)
    {
        self::validateAppId($appId);
        self::$appId = $appId;
    }

    /**
     * Validates given App ID
     * @param $appId string
     * @return bool
     */
    private static function validateAppId($appId)
    {
        if (!is_string($appId)) {
            throw new \InvalidArgumentException('App ID is not a string.');
        }
        if (strlen($appId) < 4) {
            throw new \InvalidArgumentException('App ID "' . $appId . '" is too short, and thus invalid.');
        }
        return true;
    }

    /**
     * Returns the app ID that has been defined.
     * @return null|string
     */
    public function getAppId()
    {
        return ($this->instanceAppId) ? $this->instanceAppId : self::$appId;
    }
    /**
     * Sets the client to be used for querying the API endpoints
     *
     * @param Client $client
     * @see http://php-http.readthedocs.org/en/latest/utils/#httpmethodsclient
     * @return $this
     */
    public function setHttpClient(Client $client = null)
    {
        if ($client === null) {
            $client = new Client();
        }

        $this->client = $client;

        return $this;
    }
    /**
     * Returns either the instance of the Guzzle client that has been defined, or null
     * @return Client|null
     */
    public function getHttpClient()
    {
        return $this->client;
    }

    /**
     * @param Entity $entity
     * @return $this
     */
    public function setEntity(Entity $entity)
    {
        $this->entity = $entity;
        return $this;
    }

    /**
     * @return Entity
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * Creates a Latest Rates API interface
     *
     * @param string $url Url to analyze
     * @return Latest
     */
    public function createLatestAPI()
    {
        $api = new Latest();

        return $api->registerWrapper($this);
    }
}