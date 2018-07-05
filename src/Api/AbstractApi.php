<?php

namespace nickurt\Oxxa\Api;

use nickurt\Oxxa\Client;

abstract class AbstractApi implements ApiInterface
{
    /**
     * @var Client
     */
    public $client;

    /**
     * AbstractApi constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param $parameters
     * @return mixed
     */
    protected function request($parameters)
    {
        $parameters = array_merge([
            'apiuser' => $this->client->getHttpClient()->getOptions()['username'],
            'apipassword' => 'MD5'.md5($this->client->getHttpClient()->getOptions()['password'])
        ], $parameters);

        $parameters = ($this->client->getEnvironment() == 'test') ? array_merge(['test' => 'Y'], $parameters) : $parameters;

        $response = $this->client->getHttpClient()->get(
            $parameters
        );

        return $response;
    }
}