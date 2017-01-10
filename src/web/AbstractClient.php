<?php

namespace SuspectDoubloon\Slack\Web;

use GuzzleHttp\Client;

abstract class AbstractClient{
    protected $endpoint = '';
    protected $token = '';
    protected $client;

    public function __construct($token)
    {
        $this->token = $token;
        $this->client = new Client();
    }
}