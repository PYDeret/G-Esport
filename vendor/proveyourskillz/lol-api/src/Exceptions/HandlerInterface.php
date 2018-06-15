<?php namespace PYS\LolApi\Exceptions;

use GuzzleHttp\Exception\RequestException;
use PYS\LolApi\ApiRequest\ApiRequestInterface;

interface HandlerInterface
{
    /**
     * @param RequestException $requestException
     * @param ApiRequestInterface $apiRequest
     * @throws \Exception
     */
    public function handle(RequestException $requestException, ApiRequestInterface $apiRequest): void;
}