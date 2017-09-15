<?php

namespace SuspectDoubloon\Slack\Web;


class ChatClient extends AbstractClient
{
    protected $endpoint = 'https://slack.com/api/chat';

    public function delete($ts, $channel, $as_user = null)
    {
        $endpoint = $this->endpoint . '.delete';
        $parameters = ['query' => [
            'token' => $this->token,
            'ts' => $ts,
            'channel' => $channel,
        ]];
        if (!is_null($as_user)) $parameters['query']['as_user'] = $as_user;
        $res = $this->client->request('GET', $endpoint, $parameters);
        return $this->resolve($res);
    }

    public function meMessage($channel, $text)
    {
        $endpoint = $this->endpoint . '.meMessage';
        $parameters = ['query' => [
            'token' => $this->token,
            'channel' => $channel,
            'text' => $text
        ]];
        $res = $this->client->request('GET', $endpoint, $parameters);
        return $this->resolve($res);
    }

    /**
     * @param $channel
     * @param $text
     * @param $options - an array containing values of the optional parameters in the chat.PostMessage endpoint
     * @return mixed
     */
    public function postMessage($channel, $text, $options = [])
    {
        $endpoint = $this->endpoint . '.postMessage';
        $query = [
            'token' => $this->token,
            'channel' => $channel,
            'text' => $text
        ];
        $query = array_merge($query, $options);
        $res = $this->client->request('GET', $endpoint, ['query' => $query]);
        return $this->resolve($res);
    }

    /**
     * @param $ts
     * @param $channel
     * @param $text
     * @param $options
     * @return mixed
     */
    public function update($ts, $channel, $text, $options = [])
    {
        $endpoint = $this->endpoint . '.update';
        $query = [
            'token' => $this->token,
            'ts' => $ts,
            'channel' => $channel,
            'text' => $text
        ];
        $query = array_merge($query, $options);
        $res = $this->client->request('GET', $endpoint, ['query' => $query]);
        return $this->resolve($res);
    }
}