<?php

namespace nickurt\Oxxa\Api;

class Identities extends AbstractApi
{
    /**
     * @param array $params
     * @return array
     */
    public function add($params)
    {
        return $this->request(array_merge(['command' => 'identity_add'], $params));
    }

    /**
     * @param array $params
     * @return array
     */
    public function del($params)
    {
        return $this->request(array_merge(['command' => 'identity_del'], $params));
    }

    /**
     * @param array $params
     * @return array
     */
    public function get($params)
    {
        return $this->request(array_merge(['command' => 'identity_get'], $params));
    }

    /**
     * @param array $params
     * @return array
     */
    public function list($params = [])
    {
        return $this->request(array_merge(['command' => 'identity_list'], $params));
    }

    /**
     * @param array $params
     * @return array
     */
    public function upd($params)
    {
        return $this->request(array_merge(['command' => 'identity_upd'], $params));
    }
}