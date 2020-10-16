<?php

namespace Famdirksen\FFReserverenPhpSdk;

use Carbon\Carbon;
use Famdirksen\FFReserverenPhpSdk\Actions\ManagesCustomers;
use Famdirksen\FFReserverenPhpSdk\Actions\ManagesUsers;
use Famdirksen\FFReserverenPhpSdk\Actions\ManagesTeams;
use GuzzleHttp\Client;

class FFReserveren
{
    use MakesHttpRequests;
    use ManagesCustomers;
    use ManagesTeams;
    use ManagesUsers;

    /** @var string */
    public string $apiToken;

    public Client $client;

    public function __construct(string $apiToken, string $baseUri = 'https://api.ffreserveren.nl/')
    {
        $this->apiToken = $apiToken;

        $this->client = new Client([
            'base_uri' => $baseUri,
            'http_errors' => false,
            'verify' => false,
            'headers' => [
                'Authorization' => "Bearer {$this->apiToken}",
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function setClient(Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    protected function transformCollection(array $collection, string $class): array
    {
        return array_map(function ($attributes) use ($class) {
            return new $class($attributes, $this);
        }, $collection);
    }

    public function convertDateFormat(string $date, $format = 'YmdHis'): string
    {
        return Carbon::parse($date)->format($format);
    }
}
