<?php

namespace nickurt\Oxxa\Api;

class Identities extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     */
    public function add($params)
    {
        return $this->request(array_merge(['command' => 'identity_add'], $params));
    }

    /**
     * @param $params
     * @return mixed
     */
    public function del($params)
    {
        return $this->request(array_merge(['command' => 'identity_del'], $params));
    }

    /**
     * @param $params
     * @return mixed
     */
    public function get($params)
    {
        return $this->request(array_merge(['command' => 'identity_get'], $params));
    }

    /**
     * @param $params
     * @return mixed
     */
    public function list($params = [])
    {
        return $this->request(array_merge(['command' => 'identity_list'], $params));
    }

    /**
     * @param $params
     * @return mixed
     */
    public function upd($params)
    {
        return $this->request(array_merge(['command' => 'identity_upd'], $params));
    }
}