<?php


namespace SuspectDoubloon\Slack\Web;


class AuthClient extends AbstractClient
{
    protected $endpoint = 'https://slack.com/api/auth';

    /**
     * @return mixed
     */
    public function test()
    {
        $endpoint = $this->endpoint . '.test';
        $parameters['query']['token'] = $this->token;
        $res = $this->client->request('GET', $endpoint, $parameters);
        return json_decode((string)$res->getBody());
    }

    /**
     * @param bool $test
     * @return mixed
     */
    public function revoke($test = false)
    {
        $endpoint = $this->endpoint . '.revoke';
        $parameters['query']['token'] = $this->token;
        if ($test) $parameters['query']['test'] = true;
        $res = $this->client->request('GET', $endpoint, $parameters);
        return json_decode((string)$res->getBody());
    }
}