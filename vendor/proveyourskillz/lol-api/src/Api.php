<?php namespace PYS\LolApi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\ResponseInterface;

use PYS\LolApi\ApiRequest\ApiQueryRequestInterface;
use PYS\LolApi\ApiRequest\ApiRequestInterface;
use PYS\LolApi\ApiRequest\Region;
use PYS\LolApi\Exceptions\Handler;
use PYS\LolApi\Exceptions\HandlerInterface;
use PYS\LolApi\Models\CurrentGameModel;
use PYS\LolApi\Models\ModelInterface;
use PYS\LolApi\Exceptions\WrongRequestException;
use PYS\LolApi\Models\LeagueModel;
use PYS\LolApi\Models\LeaguePositionModel;
use PYS\LolApi\Models\MatchListModel;
use PYS\LolApi\Models\MatchModel;
use PYS\LolApi\Models\SummonerModel;

/**
 * @method SummonerModel summoner(Region|string $region, $value, string $credential = 'summoner')
 * @method MatchModel match(Region|string $region, int $matchId, ?int $tournamentId = null)
 * @method MatchListModel matchList(Region|string $region, int $accountId, array $query = [])
 * @method LeaguePositionModel leaguePosition(Region|string $region, int $summonerId)
 * @method LeagueModel league(Region|string $region, int $summonerId)
 * @method CurrentGameModel currentGame(Region|string $region, int $summonerId)
 */
class Api
{
    private const DEFAULT_PATH = '/lol/';
    private const RATE_LIMITS_TYPE = [
        'X-Rate-Limit-Count' => 'general',
        'X-App-Rate-Limit-Count' => 'app',
        'X-Method-Rate-Limit-Count' => 'method',
    ];

    /**
     * @var Client
     */
    private $http;
    /**
     * @var array
     */
    private $rateLimits = [];
    /**
     * @var Uri
     */
    private $endpointURI;
    /**
     * @var HandlerInterface
     */
    private $exceptionHandler;

    /**
     * Api constructor.
     *
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->http = $this->setupHttpClient($apiKey);
        $this->endpointURI = new Uri('https:');
        $this->exceptionHandler = new Handler();
    }

    public function __call($name, $args)
    {
        $region = array_shift($args);
        if (!$region instanceof Region) {
            $region = new Region($region);
        }
        $class = sprintf('PYS\LolApi\ApiRequest\%sRequest', ucfirst($name));
        if (class_exists($class)) {
            return $this->make(
                $region,
                new $class(...$args)
            );
        }

        throw new WrongRequestException("Request $name doesn't exists");
    }

    /**
     * @param Region $region
     * @param ApiRequestInterface $apiRequest
     *
     * @return ModelInterface
     */
    public function make(Region $region, ApiRequestInterface $apiRequest): ModelInterface
    {
        $uri = $this->getUriForRequest($apiRequest, $region);
        $options = [];
        if ($apiRequest instanceof ApiQueryRequestInterface) {
            $options['query'] = $apiRequest->getQuery()->toArray();
        }
        try {
            $response = $this->http->get($uri, $options);
            $this->setRateLimits($response);
        } catch (RequestException $requestException) {
            $this->exceptionHandler->handle($requestException, $apiRequest);
        }

        return $apiRequest
            ->getMapper()
            ->map(\GuzzleHttp\json_decode($response->getBody()))
            ->wireRegion($region)
            ->wireApi($this);
    }

    public function getRateLimits(): array
    {
        return $this->rateLimits;
    }

    private function setupHttpClient(string $apiKey): Client
    {
        return new Client([
            'headers' => [
                'X-Riot-Token' => $apiKey,
            ],
        ]);
    }

    private function setRateLimits(ResponseInterface $response): void
    {
        $headers = array_filter(
            $response->getHeaders(),
            function ($key) {
                return in_array(
                    $key,
                    ['X-Rate-Limit-Count', 'X-App-Rate-Limit-Count', 'X-Method-Rate-Limit-Count'],
                    true
                );
            },
            ARRAY_FILTER_USE_KEY
        );
        foreach ($headers as $name => $value) {
            foreach (explode(',', $value[0]) as $limit) {
                [$requests, $seconds] = explode(':', $limit);
                $this->rateLimits[self::RATE_LIMITS_TYPE[$name]][] = [
                    'requests' => (int)$requests,
                    'seconds' => (int)$seconds,
                ];
            }
        }
        unset($headers);
    }

    private function getUriForRequest(ApiRequestInterface $apiRequest, Region $region): Uri
    {
        $host = $region->getPlatformEndpoint();
        $path = self::DEFAULT_PATH . $apiRequest->getType() . '/';
        if ($version = $apiRequest->getVersion()) {
            $path .= "v{$version}/";
        }
        foreach ($apiRequest->getSubtypes() as $subtype => $value) {
            if ($subtype) {
                $path .= $subtype . '/' . $value . '/';
            } else {
                $path .= $value . '/';
            }
        }

        return $this->endpointURI
            ->withHost($host)
            ->withPath($path);
    }
}
