<?php

namespace nickurt\Oxxa\Api;

class NsGroups extends AbstractApi
{
    /**
     * @param array $params
     * @return array
     */
    public function add($params)
    {
        return $this->request(array_merge(['command' => 'nsgroup_add'], $params));
    }

    /**
     * @param array $params
     * @return array
     */
    public function del($params)
    {
        return $this->request(array_merge(['command' => 'nsgroup_del'], $params));
    }

    /**
     * @param array $params
     * @return array
     */
    public function get($params)
    {
        return $this->request(array_merge(['command' => 'nsgroup_get'], $params));
    }

    /**
     * @param array $params
     * @return array
     */
    public function list($params = [])
    {
        return $this->request(array_merge(['command' => 'nsgroup_list'], $params));
    }

    /**
     * @param array $params
     * @return array
     */
    public function upd($params)
    {
        return $this->request(array_merge(['command' => 'nsgroup_upd'], $params));
    }
}
