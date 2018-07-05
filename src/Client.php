<?php

namespace nickurt\Oxxa;

use nickurt\Oxxa\HttpClient\HttpClient;

class Client
{
    /**
     * @var
     */
    protected $httpClient;

    /**
     * @var array
     */
    protected $endpoints = [
        'live' => 'https://api.oxxa.com/command.php'
    ];

    /**
     * @var
     */
    protected $environment;

    /**
     * @var array
     */
    protected $classes = [
        'domains' => 'Domains',
        'funds' => 'Funds',
        'identities' => 'Identities',
    ];

    /**
     * @param $method
     * @param $args
     * @return mixed
     */
    public function __call($method, $args)
    {
        try {
            return $this->api($method);
        } catch (InvalidArgumentException $e) {
            throw new \BadMethodCallException(sprintf('Undefined method called:"%s"', $method));
        }
    }

    /**
     * @param $name
     * @return mixed
     */
    public function api($name)
    {
        if(!isset($this->classes[$name])) {
            throw new \InvalidArgumentException(sprintf('Undefined method called:"%s"', $name));
        }

        $class = '\\nickurt\\Oxxa\\Api\\' . $this->classes[$name];

        return new $class($this);
    }

    /**
     * @return mixed
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * @param $environment
     */
    public function setEnvironment($environment)
    {
        $this->environment = $environment;
    }

    /**
     * @return mixed
     */
    public function getEndpointUrl()
    {
        return $this->endpoints['live'];
    }

    /**
     * @param $username
     * @param $password
     */
    public function setCredentials($username, $password)
    {
        $this->getHttpClient()->setOptions([
            'username' => $username,
            'password' => $password
        ]);
    }

    /**
     * @return HttpClient
     */
    public function getHttpClient()
    {
        if (!isset($this->httpClient)) {
            $this->httpClient = new HttpClient();
            $this->httpClient->setOptions([
                'base_url' => $this->getEndpointUrl()
            ]);
        }

        $this->httpClient->setOptions([
            'base_url' => $this->getEndpointUrl()
        ]);

        return $this->httpClient;
    }
}