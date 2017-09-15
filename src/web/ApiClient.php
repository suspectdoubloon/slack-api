<?php

namespace SuspectDoubloon\Slack\Web;

class ApiClient extends AbstractClient{
    protected $endpoint = 'https://slack.com/api/api';

    public function test($error=null, $foo = null, ...$extras){
        $endpoint = $this->endpoint . '.test';
        $parameters = ['query'=>[
            'error' => $error,
            'foo'   => $foo
        ]];
        foreach($extras as $extra){
            $parameters['query'][$extra] = '';
        }
        $res = $this->client->request('GET', $endpoint, $parameters);
        return $this->resolve($res);
    }
}