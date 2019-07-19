<?php

namespace nickurt\Oxxa;

class Oxxa
{
    /** @var \Illuminate\Foundation\Application */
    protected $app;

    /** @var array */
    protected $connections = [];

    /** @var \nickurt\Oxxa\Client */
    protected $client;

    /**
     * Oxxa constructor.
     * @param \Illuminate\Foundation\Application $app
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * @param string $method
     * @param array $args
     * @return Api\Domains|Api\Funds|Api\Identities
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->client, $method], $args);
    }

    /**
     * @param string|null $name
     * @return Client
     */
    public function connection($name = null)
    {
        $name = $name ?: $this->getDefaultConnection();

        return $this->connections[$name] = $this->get($name);
    }

    /**
     * @return string
     */
    public function getDefaultConnection()
    {
        return $this->app['config']['oxxa.default'];
    }

    /**
     * @param string $name
     * @return Client
     */
    protected function get($name)
    {
        return $this->connections[$name] ?? $this->resolve($name);
    }

    /**
     * @param string $name
     * @return Client
     */
    protected function resolve($name)
    {
        $config = $this->getConfig($name);

        $this->client =  new \nickurt\Oxxa\Client();
        $this->client->setCredentials(
            $config['username'],
            $config['password']
        );
        $this->client->setEnvironment(isset($config['test']) ? 'test' : 'live');

        return $this->client;
    }

    /**
     * @param string $name
     * @return array
     */
    protected function getConfig($name)
    {
        return $this->app['config']["oxxa.connections.{$name}"];
    }
}
