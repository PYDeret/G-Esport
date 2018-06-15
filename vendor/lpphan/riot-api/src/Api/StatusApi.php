<?php

namespace Lpphan\Api;

/**
 * Description of StatusApi
 *
 * @author lamphuong
 */
class StatusApi extends AbstractApi
{
    protected $url = 'http://status.leagueoflegends.com/';

    protected function getBaseUrlWithRegion()
    {
        return $this->url;
    }

    public function getShardList()
    {
        return $this->makeRequest('shards');
    }

    public function getShardStatus($shard)
    {
        $path = "shards/$shard";
        return $this->makeRequest($path);
    }
}