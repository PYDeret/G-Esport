# League of Legends PHP API wrapper

Dead simple wrapper of Riot Games API (LoL)

## Requirements
* PHP 7.1
* works better with ext-curl installed

## Installation

`composer require proveyourskillz/lol-api`

### Creating API instance
```php
$api = new PYS\LolApi\Api(API_KEY);
```
### Laravel/Lumen service provider and Facade

#### Laravel/Lumen 5.5
ServiceProvider and Facade are registered automatically through [package discovery](https://laravel.com/docs/5.5/packages#package-discovery)

#### Laravel 5.4
In `config/app.php` add `PYS\LolApi\Laravel\ServiceProvider` as provider

#### Lumen 5.4
Register ServiceProvider according [documentation](https://lumen.laravel.com/docs/5.5/providers#registering-providers)

Optionally you can add facade to aliases `'LolApi' => PYS\LolApi\Laravel\Facade::class`

After installation you can use API through facade or inject as dependency

## Usage

You can find examples of usage in `examples` dir

### Region
You can pass region to request as [2-3 characters code](https://developer.riotgames.com/regional-endpoints.html) but better use `Region` class constants

```php
use PYS\LolApi\ApiRequest\Region;

$summoner = $api->summoner(Region::EUW, $summonerId);
```

### Summoner
There are several ways to get Summoner: by account id, summoner id or by name

```php
// You can get summoner in several ways by passing type in third argument
// Default version: summoner, you can ommit it
$summonerById = $api->summoner($region, $summonerId);
$summonerByAccount = $api->makeSummoner($region, $accountId, 'account');
$summonerByName = $api->summoner($region, $name, 'name');
```

For more information see [Summoner API reference](https://developer.riotgames.com/api-methods/#summoner-v3)

### Match List

Recent

```php
$matches = $api->matchList($region, $accountId);
```
Recent via Summoner

```php
$matches = $api->summoner($region, $summonerId)->recentMatches();
```

Using query (e.g. one last match)

```php
$matches = $api->matchList(
    $region,
    $accountId,
    [
        'beginIndex' => 0,
        'endIndex' => 1,
    ]
);
```

### Match
Match by Id

```php
$match = $api->match($region, $matchId);
```

Match within Tournament

```php
$match = $api->match($region, $matchId, $tournamentId);
```
For more information see [Match API reference](https://developer.riotgames.com/api-methods/#match-v3)

### Leagues

Leagues and Positions of summoner by Summoner Id

```php
$leaguesPositions = $api->leaguePosition($region, $summonerId);
```

Leagues and Positions of summoner via Summoner object

```php
$leaguesPositions = $api
    ->summoner($region, $summonerId)
    ->leaguesPositions();
```

Leagues by Summoner Id

```php
$leagues = $api->league($region, $summonerId);
```

## Reusable requests and queries
Examples from above (e.g. match list request with query) are shows usage of syntax sugar methods and can be rewritten as

```php
use PYS\LolApi\ApiRequest\MatchListRequest;
use PYS\LolApi\ApiRequest\Query\MatchListQuery;

$api = new PYS\LolApi\Api($API_KEY);

$query = new MatchListQuery;
$request = new MatchListRequest($region, $accountId);
$request->setQuery($query->lastMatches(1));

$matchList = $api->make($request);
```

Query objects have fluent setters for easy setup some properties like dates etc.

```php
// Setup query object to get last 5 matches in 24 hours
$query = new MatchListQuery;
$query
    ->fromDate(new DateTime('-24 hours'))
    ->lastMatches(5);
``` 

## Contributing

1. Fork it!
2. Create your feature branch: `git checkout -b my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin my-new-feature`
5. Submit a pull request :D

## History

Alpha version

## Credits
- Anton Orlov <anton@proveyourskillz.com>
- Pavel Dudko <pavel@proveyourskillz.com>

## License

MIT 