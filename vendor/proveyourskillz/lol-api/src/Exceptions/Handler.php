<?php namespace PYS\LolApi\Exceptions;

use GuzzleHttp\Exception\RequestException;
use PYS\LolApi\ApiRequest\ApiRequestInterface;
use ReflectionClass;

class Handler implements HandlerInterface
{
    public function handle(RequestException $requestException, ApiRequestInterface $apiRequest): void
    {
        switch ($requestException->getCode()) {
            case 400:
                throw new WrongParametersException(
                    'A provided parameters are in the wrong format or required parameter was not provided'
                );
                break;
            case 403:
                throw new AccessDeniedException('Something wrong with your API key or credentials');
                break;
            case 404:
                $type = str_replace(
                    'Request',
                    '',
                    (new ReflectionClass($apiRequest))->getShortName()
                );
                throw new NotFoundException("Request of type $type not found");
                break;
            case 429:
                throw new RateLimitExceededException(
                    'The application has exhausted its maximum number of allotted API calls allowed for a given duration'
                );
                break;
            case 500:
            case 503:
                throw new ApiUnavailableException('Riot API serve is incapable of performing the request');
                break;
            default:
                throw new OtherRequestException(
                    "Unknown error [HTTP CODE {$requestException->getCode()}]"
                );
                break;
        }
    }
}
