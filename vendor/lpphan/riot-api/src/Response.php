<?php

namespace Lpphan;

/**
 * Description of Response
 *
 * @author lamphuong
 */
class Response
{
    /**
     *
     * @var mixed Reponse body
     */
    protected $body;

    /**
     *
     * @var string
     */
    protected $urlRequested;

    /**
     *
     * @var boolean
     */
    protected $fetchedFromCache = false;

    /**
     *
     * @var CacheInterface
     */
    protected $cache;

    public function __construct(CacheInterface $cache)
    {
        $this->cache = $cache;
    }

    public function setUrl($url)
    {
        $this->urlRequested = $url;
        return $this;
    }

    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    public function setFetchedFromCache($bool)
    {
        $this->fetchedFromCache = $bool;
        return $this;
    }

    public function getUrl()
    {
        return $this->urlRequested;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function isFetchedFromCache()
    {
        return $this->fetchedFromCache;
    }

    public function remember($minutes)
    {
        if (!$this->fetchedFromCache) {
            $this->cache->set($this->urlRequested, $this->body, $minutes * 60);
        }
        return $this;
    }

    public function __toString()
    {
        return json_encode($this->body);
    }
}