<?php

namespace App\services\rapyd;

use Config;
use GuzzleHttp\Client;

class RapydGateway
{
    /**
     * The api secret key.
     *
     * @var string
     */
    protected string $secretKey;

    /**
     * The api base url
     *
     * @var string
     */
    protected string $baseUrl;

    /**
     * Response from request made to rapyd.
     *
     * @var mixed
     */
    protected mixed $response;

    /**
     * Client instance.
     *
     * @var Client
     */
    protected Client $client;

    public function __construct()
    {
        $this->baseUrl = Config::get('rapyd.rapyd_base_url');
        $this->secretKey = Config::get('rapyd.rapyd_secret_key');

        $this->client = new Client([]);
    }


}
