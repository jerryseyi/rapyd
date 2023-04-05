<?php

namespace App\services\rapyd;

use Config;
use DateTime;
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

    /**
     * Get access key for rapyd.
     *
     * @var string
     */
    protected string $accessKey;

    /**
     * Get Date timestamp.
     *
     * @var int|DateTime
     */
    protected int|DateTime $timestamp;

    public function __construct()
    {
        $this->setCredentials();
        $this->client = new Client(['base_url' => $this->baseUrl,
                'headers' => [
                    'Content-Type' => 'application/json',
                    'access_key' => $this->accessKey,
                    'salt' => TransRef::getHashedToken(),
                    'timestamp' => $this->timestamp,
                    'signature' => $this->hashKey(),
                    'idempotency' => TransRef::getHashedToken()
                ]
            ]);
    }

    /**
     * Set the credentials needed for the request.
     *
     * @return void
     */
    protected function setCredentials(): void
    {
        $this->baseUrl = Config::get('rapyd.rapyd_base_url');
        $this->secretKey = Config::get('rapyd.rapyd_secret_key');
        $this->accessKey = Config::get('rapyd.rapyd_access_key');
        $this->timestamp = new DateTime();
        $this->timestamp = $this->timestamp->getTimestamp();
    }

    /**
     * Hash secret key before sending it with request headers.
     *
     * @return string
     */
    protected function hashKey(): string
    {
        $sig_string = "$this->timestamp$this->accessKey$this->secretKey$this->baseUrl";
        $hash_sig_string = hash_hmac("sha256", $sig_string, $this->secretKey);
        return base64_encode($hash_sig_string);
    }
}
