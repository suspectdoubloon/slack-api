<?php

namespace SuspectDoubloon\Slack\Web;

class BotClient extends AbstractClient
{
    protected $endpoint = 'https://slack.com/api/bots';

    /**
     * @param null $bot
     * @return mixed
     */
    public function info($bot = null)
    {
        $endpoint = $this->endpoint . '.info';
        $parameters['query']['token'] = $this->token;
        if (!is_null($bot)) $parameters['query']['bot'] = $bot;
        $res = $this->client->request('GET', $endpoint, $parameters);
        return json_decode((string)$res->getBody());
    }
}