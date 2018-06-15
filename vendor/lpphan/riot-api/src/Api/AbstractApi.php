<?php

namespace Lpphan\Api;

use Lpphan\RiotApi;
use Lpphan\Response;
use GuzzleHttp\Exception\ClientException;
use Lpphan\Exception\Http400Exception;
use Lpphan\Exception\Http401Exception;
use Lpphan\Exception\Http403Exception;
use Lpphan\Exception\Http404Exception;
use Lpphan\Exception\Http429Exception;
use Lpphan\Exception\HttpServerException;

/**
 * Description of AbstractApi
 *
 * @author lamphuong
 */
abstract class AbstractApi
{
    /**
     * @var string The default domain to attempt to query
     */
    protected static $defaultDomain = 'https://%s.api.pvp.net/api/lol/%s/';

    /**
     * @var string he default domain for static queries
     */
    protected static $defaultStaticDomain = 'https://global.api.pvp.net/api/lol/static-data/%s/';

    /**
     *
     * @var \Lpphan\RiotApi
     */
    protected $lolApi;

    /**
     *
     * @var string Base url
     */
    protected $baseUrl;
    protected $version;

    public function __construct(RiotApi $lolApi)
    {
        $this->lolApi  = $lolApi;
        $this->baseUrl = $this->getBaseUrlWithRegion();
    }

    protected function getBaseUrlWithRegion()
    {
        return sprintf(self::$defaultDomain, $this->lolApi->getRegion(),
                $this->lolApi->getRegion())
            .$this->version.'/';
    }

    /**
     * 
     * @param string $path
     * @param array $params
     * @return Response
     */
    protected function makeRequest($path, array $params = null)
    {
        $queryParams = $params != null ? array_merge(['api_key' => $this->lolApi->getApiKey()],
                $params) : ['api_key' => $this->lolApi->getApiKey()];

        $url = $this->buildUrl($path, $queryParams);

        if ($this->lolApi->getCache()->has($url)) {
            return $this->buildResponse($url,
                    $this->lolApi->getCache()->get($url), true);
        }
        try {
            $response = $this->lolApi->getClient()->get($url);

            return $this->buildResponse($url,
                    json_decode($response->getBody(), true), false);
        } catch (ClientException $ex) {
            $this->handleException($ex);
        }
    }

    private function handleException(ClientException $ex)
    {
        $code = $ex->getResponse()->getStatusCode();
        if ($code >= 500) {
            throw new HttpServerException('Service unavailable', $code);
        }
        switch ($code) {
            case 400:
                throw new Http400Exception('Bad request', $code);
            case 401:
                throw new Http401Exception('Invalid API key', $code);
            case 403:
                throw new Http403Exception('Invalid API key', $code);
            case 404:
                throw new Http404Exception('Resource not found', $code);
            case 429:
                $retry = $ex->getResponse()->getHeader('Retry-After')[0];
                throw new Http429Exception('Rate Limit Exceeded', $retry);
            default :
                throw new Http400Exception('Bad request', $code);
        }
    }

    protected function buildUrl($path, array $params)
    {
        return $this->baseUrl.$path.'?'.http_build_query($params);
    }

    private function buildResponse($url, $body, $fetchedFromCache)
    {
        return (new Response($this->lolApi->getCache()))
                ->setBody($body)
                ->setFetchedFromCache($fetchedFromCache)
                ->setUrl($url);
    }
}