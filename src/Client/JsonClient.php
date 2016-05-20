<?php

namespace DusanKasan\Chan\Client;

use DusanKasan\Chan\Client\Exceptions\InvalidJson;

class JsonClient
{
    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function get(string $url)
    {
        $body = $this->client->get($url);
        $decoded = json_decode($body, TRUE);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new InvalidJson($body, json_last_error());
        }

        return $decoded;
    }
}
