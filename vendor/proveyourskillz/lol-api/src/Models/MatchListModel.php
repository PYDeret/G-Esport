<?php namespace PYS\LolApi\Models;

class MatchListModel extends AbstractModel
{
    /**
     * @var MatchReferenceModel[]
     */
    public $matches;
    /**
     * @var int
     */
    public $totalGames;
    /**
     * @var int
     */
    public $startIndex;
    /**
     * @var int
     */
    public $endIndex;

    public function match(MatchReferenceModel $matchReferenceModel): MatchModel
    {
        return $this
            ->getApi()
            ->match(
                $this->region,
                $matchReferenceModel->gameId
            );
    }

    public function matchByNumber(int $number): MatchModel
    {
        return $this->match($this->matches[$number]);
    }
}
