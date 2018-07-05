<?php

namespace nickurt\Oxxa\Api;

class Domains extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     */
    public function check($params)
    {
        return $this->request(array_merge(['command' => 'domain_check'], $params));
    }

    /**
     * @param $params
     * @return mixed
     */
    public function del($params)
    {
        return $this->request(array_merge(['command' => 'domain_del'], $params));
    }

    /**
     * @param $params
     * @return mixed
     */
    public function epp($params)
    {
        return $this->request(array_merge(['command' => 'domain_epp'], $params));
    }

    /**
     * @param $params
     * @return mixed
     */
    public function inf($params)
    {
        return $this->request(array_merge(['command' => 'domain_inf'], $params));
    }

    /**
     * @param $params
     * @return mixed
     */
    public function list($params = [])
    {
        return $this->request(array_merge(['command' => 'domain_list'], $params));
    }

    /**
     * @param $params
     * @return mixed
     */
    public function ns_upd($params)
    {
        return $this->request(array_merge(['command' => 'domain_ns_upd'], $params));
    }

    /**
     * @param $params
     * @return mixed
     */
    public function push($params)
    {
        return $this->request(array_merge(['command' => 'domain_push'], $params));
    }

    /**
     * @param $params
     * @return mixed
     */
    public function restore($params)
    {
        return $this->request(array_merge(['command' => 'domain_restore'], $params));
    }

    /**
     * @param $params
     * @return mixed
     */
    public function upd($params)
    {
        return $this->request(array_merge(['command' => 'domain_upd'], $params));
    }
}