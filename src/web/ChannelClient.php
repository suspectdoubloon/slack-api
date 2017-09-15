<?php

namespace SuspectDoubloon\Slack\Web;

class ChannelClient extends AbstractClient
{
    protected $endpoint = 'https://slack.com/api/channels';

    /**
     * @param $channel
     * @return mixed
     */
    public function archive($channel)
    {
        $endpoint = $this->endpoint . '.archive';
        $parameters = ['query' => [
            'token' => $this->token,
            'channel' => $channel
        ]];
        $res = $this->client->request('GET', $endpoint, $parameters);
        return $this->resolve($res);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function create($name)
    {
        $endpoint = $this->endpoint . '.create';
        $parameters = ['query' => [
            'token' => $this->token,
            'name' => $name
        ]];
        $res = $this->client->request('GET', $endpoint, $parameters);
        return $this->resolve($res);
    }

    /**
     * @param $channel
     * @param float $latest
     * @param float $oldest
     * @param int $inclusive
     * @param int $count
     * @param int $unreads
     * @return mixed
     */
    public function history($channel, $latest = 0.0, $oldest = 0.0, $inclusive = 0, $count = 100, $unreads = 1)
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
        return $this->resolve($res);
    }

    /**
     * @param $channel
     * @return mixed
     */
    public function info($channel)
    {
        $endpoint = $this->endpoint . '.info';
        $parameters = ['query' => [
            'token' => $this->token,
            'channel' => $channel
        ]];
        $res = $this->client->request('GET', $endpoint, $parameters);
        return $this->resolve($res);
    }

    /**
     * @param $channel
     * @param $user
     * @return mixed
     */
    public function invite($channel, $user)
    {
        $endpoint = $this->endpoint . '.invite';
        $parameters = ['query' => [
            'token' => $this->token,
            'channel' => $channel,
            'user' => $user
        ]];
        $res = $this->client->request('GET', $endpoint, $parameters);
        return $this->resolve($res);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function join($name)
    {
        $endpoint = $this->endpoint . 'join';
        $parameters = ['query' => [
            'token' => $this->token,
            'name' => $name
        ]];
        $res = $this->client->request('GET', $endpoint, $parameters);
        return $this->resolve($res);
    }

    /**
     * @param $channel
     * @param $user
     * @return mixed
     */
    public function kick($channel, $user)
    {
        $endpoint = $this->endpoint . '.kick';
        $parameters = ['query' => [
            'token' => $this->token,
            'channel' => $channel,
            'user' => $user
        ]];
        $res = $this->client->request('GET', $endpoint, $parameters);
        return $this->resolve($res);
    }

    /**
     * @param $channel
     * @return string
     */
    public function leave($channel)
    {
        $endpoint = $this->endpoint . '.leave';
        $parameters = ['query' => [
            'token' => $this->token,
            'channel' => $channel,
        ]];
        $res = $this->client->request('GET', $endpoint, $parameters);
        return $this->resolve($res);
    }

    /**
     * @param null $exclude_archived
     * @return mixed
     */
    public function lists($exclude_archived = null)
    {
        $endpoint = $this->endpoint . '.list';
        $parameters = ['query' => [
            'token' => $this->token
        ]];
        if (!is_null($exclude_archived)) $parameters['query']['exclude_archived'] = $exclude_archived;
        $res = $this->client->request('GET', $endpoint, $parameters);
        return $this->resolve($res);
    }

    /**
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
        return $this->resolve($res);
    }

    /**
     * @param $channel
     * @param $name
     * @return mixed
     */
    public function rename($channel, $name)
    {
        $endpoint = $this->endpoint . '.rename';
        $parameters = ['query' => [
            'token' => $this->token,
            'channel' => $channel,
            'name' => $name
        ]];
        $res = $this->client->request('GET', $endpoint, $parameters);
        return $this->resolve($res);
    }

    /**
     * @param $channel
     * @param $purpose
     * @return mixed
     */
    public function setPurpose($channel, $purpose)
    {
        $endpoint = $this->endpoint . '.setPurpose';
        $parameters = ['query' => [
            'token' => $this->token,
            'channel' => $channel,
            'purpose' => $purpose
        ]];
        $res = $this->client->request('GET', $endpoint, $parameters);
        return $this->resolve($res);
    }

    /**
     * @param $channel
     * @param $topic
     * @return mixed
     */
    public function setTopic($channel, $topic)
    {
        $endpoint = $this->endpoint . '.setTopic';
        $parameters = ['query' => [
            'token' => $this->token,
            'channel' => $channel,
            'topic' => $topic
        ]];
        $res = $this->client->request('GET', $endpoint, $parameters);
        return $this->resolve($res);
    }


    /**
     * @param $channel
     * @param $thread_ts
     * @return mixed
     */
    public function replies($channel, $thread_ts){
        $endpoint = $this->endpoint . 'replies';
        $parameters = ['query' => [
            'channel' => $channel,
            'thread_ts' => $thread_ts
        ]];
        $res = $this->client->request('GET', $endpoint, $parameters);
        return $this->resolve($res);
    }

    public function unarchive($channel){
        $endpoint = $this->endpoint . '.unarchive';
        $parameters = ['query' => [
           'token' => $this->token,
            'channel' => $channel
        ]];
        $res = $this->client->request('GET', $endpoint, $parameters);
        return $this->resolve($res);
    }

}