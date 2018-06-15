<?php namespace PYS\LolApi\ApiRequest\Query;

class MatchListQuery extends AbstractQuery
{
    protected static $queryParams = [
        'queue',
        'beginTime',
        'endIndex',
        'season',
        'champion',
        'beginIndex',
        'endTime',
    ];

    public function fromDate(\DateTime $dateTime): self
    {
        $this->query['beginTime'] = $dateTime->getTimestamp() * 1000;

        return $this;
    }

    public function toDate(\DateTime $dateTime): self
    {
        $this->query['endTime'] = $dateTime->getTimestamp() * 1000;

        return $this;
    }

    public function lastMatches(int $number): self
    {
        $this->query['beginIndex'] = 0;
        $this->query['endIndex'] = $number;

        return $this;
    }

    public function matchRange(int $start, int $end): self
    {
        $this->query['beginIndex'] = $start;
        $this->query['endIndex'] = $end;

        return $this;
    }
}