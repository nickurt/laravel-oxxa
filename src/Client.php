<?php

namespace nickurt\Oxxa;

use nickurt\Oxxa\HttpClient\HttpClient;

class Client
{
    /** @var \nickurt\Oxxa\HttpClient\HttpClient */
    protected $httpClient;

    /** @var array */
    protected $endpoints = [
        'live' => 'https://api.oxxa.com/command.php'
    ];

    /** @var string */
    protected $environment;

    /** @var array */
    protected $classes = [
        'domains' => 'Domains',
        'funds' => 'Funds',
        'identities' => 'Identities',
        'nsgroups' => 'NsGroups',
    ];

    /**
     * @param string $method
     * @param array $args
     * @return Api\Domains|Api\Funds|Api\Identities
     * @throws \BadMethodCallException
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
     * @param string $name
     * @return Api\Domains|Api\Funds|Api\Identities
     * @throws \InvalidArgumentException
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
     * @return string
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * @param string $environment
     */
    public function setEnvironment($environment)
    {
        $this->environment = $environment;
    }

    /**
     * @return string
     */
    public function getEndpointUrl()
    {
        return $this->endpoints['live'];
    }

    /**
     * @param string $username
     * @param string $password
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
