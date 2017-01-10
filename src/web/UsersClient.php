<?php

namespace SuspectDoubloon\Slack\Web;


class UsersClient extends AbstractClient{

    protected $endpoint = 'https://slack.com/api/users';

    public function lists($presence=null){
        $endpoint = $this->endpoint . '.list';
        $parameters = ['query' => [
            'token' => $this->token,
        ]];
        if(!is_null($presence)){
            $parameters['query']['presence'] = $presence;
        }
        $res = $this->client->request('GET', $endpoint, $parameters);
        $result = json_decode((string) $res->getBody());
        return $result;
    }
}