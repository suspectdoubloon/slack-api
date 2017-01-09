<?php

namespace SuspectDoubloon\Slack;

class OAuthClient{
    protected $endpoint = "https://slack.com/api/oauth.access";

    private $client_id = "";
    private $client_secret = "";

    /**
     * OAuthClient constructor. For use with OAUTH.access method for slack
     * Handy for Add to slack button or individual logins
     * @param $client_id - Client ID from app in Slack
     * @param $client_secret - Client Secret from app in slack
     */
    public function __construct($client_id, $client_secret)
    {
        $this->client_id = $client_id;
        $this->client_secret = $client_secret;
    }

    public function getAccess($code, $redirect_uri=null){
        $parameters = [
            'client_id'         => $this->client_id,
            'client_secret'     => $this->client_secret,
            'code'              => $code,
        ];
        if(!is_null($redirect_uri)) $parameters['redirect_uri'] = $redirect_uri;
        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', $this->endpoint, $parameters);

        return json_decode((string) $res->getBody());

    }
}