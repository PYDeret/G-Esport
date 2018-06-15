<?php namespace PYS\LolApi\ApiRequest;

use PYS\LolApi\ApiRequest\Query\MatchListQuery;
use PYS\LolApi\ApiRequest\Query\QueryTrait;
use PYS\LolApi\Mapper\MatchListMapper;

class MatchListRequest extends AbstractRequest implements ApiQueryRequestInterface
{
    use QueryTrait;

    protected static $mapperClass = MatchListMapper::class;

    protected $type = 'match';

    protected $accountId;

    /**
     * MatchListRequest constructor.
     *
     * @param int $accountId
     * @param array $query
     */
    public function __construct(int $accountId, array $query = [])
    {
        $this->accountId = $accountId;
        $this->query = new MatchListQuery($query);
    }

    public function getSubtypes(): array
    {
        if (empty($this->query->toArray())) {
            return [
                'matchlists/by-account' => $this->accountId,
                'recent',
            ];
        }

        return ['matchlists/by-account' => $this->accountId];
    }
}
