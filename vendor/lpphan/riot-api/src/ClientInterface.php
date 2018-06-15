<?php

namespace Lpphan;

/**
 *
 * @author lamphuong
 */
interface ClientInterface
{

    /**
     * Make a http get request
     * 
     * @param string $url
     */
    public function get($url);
}
