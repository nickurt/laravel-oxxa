<?php

namespace nickurt\Oxxa;

class Oxxa
{
    /**
     * @var
     */
    protected $app;

    /**
     * @var array
     */
    protected $connections = [];

    /**
     * @var
     */
    protected $client;

    /**
     * Oxxa constructor.
     * @param $app
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * @param $method
     * @param $args
     * @return mixed
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->client, $method], $args);
    }

    /**
     * @param null $name
     * @return Api\Client
     */
    public function connection($name = null)
    {
        $name = $name ?: $this->getDefaultConnection();

        return $this->connections[$name] = $this->get($name);
    }

    /**
     * @return mixed
     */
    public function getDefaultConnection()
    {
        return $this->app['config']['oxxa.default'];
    }

    /**
     * @param $name
     * @return Api\Client
     */
    protected function get($name)
    {
        return $this->connections[$name] ?? $this->resolve($name);
    }

    /**
     * @param $name
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
     * @param $name
     * @return mixed
     */
    protected function getConfig($name)
    {
        return $this->app['config']["oxxa.connections.{$name}"];
    }
}
