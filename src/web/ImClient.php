<?php

namespace SuspectDoubloon\Slack\Web;

class ImClient extends AbstractClient
{
    protected $endpoint = 'https://slack.com/api/im';

    /**
     * Deletes a slack channel
     * Requires position im.write
     * @param $channel - the ID of the channel to delete
     * @return mixed
     */
    public function close($channel)
    {
        $endpoint = $this->endpoint . '.close';
        $parameters = ['query' => [
            'token' => $this->token,
            'channel' => $channel
        ]];
        $res = $this->client->request('GET', $endpoint, $parameters);
        return json_decode((string)$res->getBody());
    }

    /**
     * Gets the history of channel
     * @param $channel
     * @param string $latest
     * @param int $oldest
     * @param int $inclusive
     * @param int $count
     * @param int $unreads
     * @return mixed
     */
    public function history($channel, $latest = "now", $oldest = 0, $inclusive = 0, $count = 100, $unreads = 0)
    {
        $endpoint = $this->endpoint . '.history';
        $parameters = ['query' => [
            'token' => $this->token,
            'channel' => $channel,
            'latest' => $latest,
            'oldest' => $oldest,
            'inclusive' => $inclusive,
            'count' => $count,
            'unreads' => $unreads
        ]];
        $res = $this->client->request('GET', $endpoint, $parameters);
        return json_decode((string)$res->getBody());
    }

    /**
     * Lists the IM channels the user is subscribed too
     * @return mixed
     */
    public function lists()
    {
        $endpoint = $this->endpoint . '.list';
        $parameters = ['query' => [
            'token' => $this->token
        ]];
        $res = $this->client->request('GET', $endpoint, $parameters);
        return json_decode((string) $res->getBody());
    }

    /**
     * Moves the read cursor in a direct message channel
     * @param $channel
     * @param $ts
     * @return mixed
     */
    public function mark($channel, $ts)
    {
        $endpoint = $this->endpoint . '.mark';
        $parameters = ['query' => [
            'token' => $this->token,
            'channel' => $channel,
            'ts' => $ts
        ]];
        $res = $this->client->request('GET', $endpoint, $parameters);
        return json_decode((string) $res->getBody());
    }

    /**
     * Opens an IM with the specified user
     * @param $user
     * @param null $return_im
     * @return mixed
     */
    public function open($user, $return_im=null){
        $endpoint = $this->endpoint . '.open';
        $parameters['query']['token'] = $this->token;
        $parameters['query']['user'] = $user;
        if(!is_null($return_im)) $parameters['query']['return_im'] = $return_im;
        $res = $this->client->request('GET', $endpoint, $parameters);
        return json_decode((string) $res->getBody());
    }
}