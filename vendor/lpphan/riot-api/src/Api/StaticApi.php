<?php

namespace Lpphan\Api;

/**
 * Description of StaticApi
 *
 * @author lamphuong
 */
class StaticApi extends AbstractApi
{
    protected $version = '1.2';

    protected function getBaseUrlWithRegion()
    {
        return sprintf($this->defaultStaticDomain, $this->lolApi->getRegion())."/$this->version/";
    }

    public function getChampionList(array $params = null)
    {
        return $this->makeRequest('champion', $params);
    }

    public function getChampion($championId, array $params = null)
    {
        return $this->makeRequest("champion/$championId", $params);
    }

    public function getItemList(array $params = null)
    {
        return $this->makeRequest("item", $params);
    }

    public function getItem($itemId, array $params = null)
    {
        return $this->makeRequest("item/$itemId", $params);
    }

    public function getLanguageStrings()
    {
        return $this->makeRequest('language-strings');
    }

    public function getSupportedLanguage()
    {
        return $this->makeRequest('languages');
    }

    public function getMapData(array $params = null)
    {
        return $this->makeRequest('map', $params);
    }

    public function getMasteryList(array $params = null)
    {
        return $this->makeRequest('mastery', $params);
    }

    public function getMasteryItem($masteryId, array $params = null)
    {
        return $this->makeRequest("mastery/$masteryId", $params);
    }

    public function getReamlData()
    {
        return $this->makeRequest("reaml");
    }

    public function getRuneList(array $params = null)
    {
        return $this->makeRequest('rune', $params);
    }

    public function getRune($runeId, array $params = null)
    {
        return $this->makeRequest("rune.$runeId", $params);
    }

    public function getSummonerSpellList(array $params = null)
    {
        return $this->makeRequest('summoner-spell', $params);
    }

    public function getSummonerSpell($spellId, array $params = null)
    {
        return $this->makeRequest("summoner-spell/$spellId", $params);
    }

    public function getVersions()
    {
        return $this->makeRequest('versions');
    }
}