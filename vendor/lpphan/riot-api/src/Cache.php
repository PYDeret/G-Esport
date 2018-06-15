<?php

namespace Lpphan;

use Memcached;

/**
 * Description of Cache
 *
 * @author lamphuong
 */
class Cache implements CacheInterface
{
    protected $memCache;

    public function __construct()
    {
        $this->memCache = new Memcached;
        $this->memCache->addserver('127.0.0.1', 11211, 100);
    }

    /**
     * Get the contents that are stored with the given key
     * 
     * @param string $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->memCache->get($key);
    }

    /**
     * Determines if the cache has the given key.
     * 
     * @param string $key
     * @return boolean
     */
    public function has($key)
    {
        return $this->memCache->get($key);
    }

    /**
     * Delete the contents that are stored with the given key
     * 
     * @param string $key
     */
    public function remove($key)
    {
        $this->memCache->delete($key);
    }

    /**
     * Adds the value into the cache under the given key.
     * 
     * @param string $key
     * @param string $value
     * @param int $seconds
     * @return boolean
     */
    public function set($key, $value, $seconds)
    {
        return $this->memCache->set($key, $value, $seconds);
    }
    
}