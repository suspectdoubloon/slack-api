<?php

namespace SuspectDoubloon\Slack\Web;

class GroupClient extends ChannelClient {
    protected $endpoint = 'https://slack.com/api/groups';

    /**
     * @param $channel
     * @return mixed
     */
    public function close($channel){
        $endpoint = $this->endpoint . '.close';
        $parameters = ['query' => [
            'token' => $this->token,
            'channel' => $channel
        ]];
        $res = $this->client->request('GET', $endpoint, $parameters);
        return $this->resolve($res);
    }

    /**
     * @param $name
     * @return null
     */
    public function join($name){
        return null;
    }

    /**
     * @param $channel
     * @return mixed
     */
    public function createChild($channel){
        $endpoint = $this->endpoint . '.createChild';
        $parameters = ['query' => [
            'token' => $this->token,
            'channel' => $channel
        ]];
        $res = $this->client->request('GET', $endpoint, $parameters);
        return $this->resolve($res);
    }

    /**
     * @param $channel
     * @return mixed
     */
    public function open($channel){
        $endpoint = $this->endpoint . '.createChild';
        $parameters = ['query' => [
            'token' => $this->token,
            'channel' => $channel
        ]];
        $res = $this->client->request('GET', $endpoint, $parameters);
        return $this->resolve($res);
    }
}