<?php

namespace Lpphan\Exception;

/**
 * Description of Http429Exception
 *
 * @author lamphuong
 */
final class Http429Exception extends HttpException {

    private $retryAfter;

    public function __construct($message, $retryAfter) {
        $this->retryAfter = $retryAfter;
        parent::__construct($message, 429);
    }

    public function retryAfter() {
        return $this->retryAfter;
    }

}
