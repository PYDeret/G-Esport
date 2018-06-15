<?php

namespace Lpphan;

/**
 *
 * @author lamphuong
 */
interface CacheInterface
{

    public function set($key, $value, $seconds);

    public function get($key);

    public function has($key);

    public function remove($key);
}