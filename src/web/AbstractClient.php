<?php

namespace SuspectDoubloon\Slack\Web;

use GuzzleHttp\Client;
use Psr\Http\Message\MessageInterface;

abstract class AbstractClient{
    protected $endpoint = '';
    protected $token = '';
    protected $client;

    public function __construct($token)
    {
        $this->token = $token;
        $this->client = new Client();
    }

    public function resolve(MessageInterface $data)
    {
        return json_decode((string) $data->getBody());
    }
}