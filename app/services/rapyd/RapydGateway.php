<?php

namespace App\services\rapyd;

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


}
