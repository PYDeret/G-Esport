<?php

namespace Lpphan\Api;

/**
 * @author lamphuong
 */
class ChampionApi extends AbstractApi
{
    protected $version = 'v1.3';

    /**
     * Get all the champions in the given region.
     *
     * @param boolean $free set to true if you want to fetch free champion only
     */
    public function getAllChampions($free = false)
    {
        $path = 'champion';
        return $this->makeRequest($path, $free ? ['freeToPlay' => true] : null);
    }

    /**
     * Get the information for a single champion.
     *
     * @param int $id
     * @return json
     */
    public function getChampion($id)
    {
        $path = "champion/$id";
        return $this->makeRequest($path);
    }
}