<?php

namespace SuspectDoubloon\Slack\Auth;

use GuzzleHttp\Client;

class OAuthClient
{
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


    /**
     * Performs the slack OAUTH API method
     * @param $code -> Code received from user when they approve the app
     * @param null $redirect_uri -> redirect url if specified will redirect to this url otherwise it will use the one
     * set in the app.
     * @return mixed -> Appropiate JSON object containing slack response message if now errors
     */
    public function access($code, $redirect_uri = null)
    {
        $parameters = [
            'query' => [
                'client_id' => $this->client_id,
                'client_secret' => $this->client_secret,
                'code' => $code,
            ]
        ];
        if (!is_null($redirect_uri)) $parameters['query']['redirect_uri'] = $redirect_uri;
        $client = new Client();
        $res = $client->request('GET', $this->endpoint, $parameters);
        $result = json_decode((string)$res->getBody());
        return $result;
    }
}