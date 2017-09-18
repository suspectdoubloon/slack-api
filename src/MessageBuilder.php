<?php

namespace SuspectDoubloon\Slack;

use SuspectDoubloon\Slack\Web\ChatClient;

class MessageBuilder
{
    private $client;
    private $text;
    private $attatchments;
    private $channel_id;
    private $options;

    public function __construct($token)
    {
        $this->client = new ChatClient($token);
        $this->attatchments = [];
        $this->options = [];
    }

    /**
     * @param $token
     * @return MessageBuilder
     */
    public static function initialise($token)
    {
        return new MessageBuilder($token);
    }

    /**
     * @param $channel_id
     * @return $this
     */
    public function channel($channel_id)
    {
        $this->channel_id = $channel_id;
        return $this;
    }

    /**
     * @param $text
     * @return $this
     */
    public function text($text)
    {
        $this->text = $text;
        return $this;
    }

    public function addAttachment(array $attatchment){
        $this->attatchments[] = $attatchment;
        return $this;
    }

    /**
     * @return mixed
     */
    public function send()
    {
        if(count($this->attatchments) > 0){
            $this->options['attachments'] = json_encode($this->attatchments);
        }
        return $this->client->postMessage($this->channel_id, $this->text, $this->options);
    }

    /**
     * @param $text
     * @return $this
     */
    public function appendText($text)
    {
        $this->text .= $text;
        return $this;
    }

    public function asUser($user_id)
    {
        $this->options['as_user'] = $user_id;
        return $this;
    }

    /**
     * @param $emoji_string
     * @return $this
     */
    public function iconEmoji($emoji_string)
    {
        $this->options['icon_emoji'] = $emoji_string;
        return $this;
    }

    /**
     * @param $url_string
     * @return $this
     * @throws \Exception
     */
    public function iconUrl($url_string)
    {
        if (filter_var($url_string, FILTER_VALIDATE_URL)) {
            $this->options['icon_url'] = $url_string;
            return $this;
        } else {
            throw new \Exception('Invalid URL string');
        }
    }


    /**
     * @param $value
     * @return $this
     */
    public function linkNames($value)
    {
        $this->options['link_name'] = $value;
        return $this;
    }


    /**
     * @param $value
     * @return $this
     */
    public function parse($value)
    {
        $this->options['parse'] = $value;
        return $this;
    }

    /**
     * @param $value
     * @return $this
     */
    public function replyBroadcast($value)
    {
        $this->options['reply_broadcast'] = $value;
        return $this;
    }

    /**
     * @param $time
     * @return $this
     */
    public function threadTs($time)
    {
        $this->options['thread_ts'] = $time;
        return $this;
    }

    /**
     * @param $value
     * @return $this
     */
    public function unfurlLinks($value)
    {
        $this->options['unfurl_links'] = $value;
        return $this;
    }

    /**
     * @param $value
     * @return $this
     */
    public function unfurlMedia($value){
        $this->options['unfurl_media'] = $value;
        return $this;
    }

    /**
     * @param $username
     * @return $this
     */
    public function username($username){
        $this->options['username'] = $username;
        return $this;
    }
}