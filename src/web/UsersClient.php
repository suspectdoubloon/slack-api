<?php

namespace SuspectDoubloon\Slack\Web;


class UsersClient extends AbstractClient{

    protected $endpoint = 'https://slack.com/api/users';

    /**
     * Deletes this user photo
     * @return mixed
     */
    public function deletePhoto(){
        $endpoint = $this->endpoint . '.deletePhoto';
        $parameters['query']['token'] = $this->token;
        $res = $this->client->request('GET', $endpoint, $parameters);
        return json_decode((string) $res->getBody());
    }

    /**
     * Gets the presence of the user
     * @param $user
     * @return mixed
     */
    public function getPresence($user){
        $endpoint = $this->endpoint . '.getPresence';
        $parameters = ['query' => [
            'token' => $this->token,
            'user' => $user
        ]];
        $res = $this->client->request('GET', $endpoint, $parameters);
        return json_decode((string) $res->getBody());
    }

    /**
     * Gets this users identity
     * @return mixed
     */
    public function identity(){
        $endpoint = $this->endpoint . '.identity';
        $parameters['query']['token'] = $this->token;
        $res = $this->client->request('GET', $endpoint, $parameters);
        return json_decode((string) $res->getBody());
    }

    /**
     * Gets information about a user
     * @param $user
     * @return mixed
     */
    public function info($user){
        $endpoint = $this->endpoint . '.info';
        $parameters = ['query' => [
            'token' => $this->token,
            'user' => $user
        ]];
        $res = $this->client->request('GET', $endpoint, $parameters);
        return json_decode((string) $res->getBody());
    }

    /**
     * Lists all the users for the team
     * @param null $presence
     * @return mixed
     */
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

    /**
     * Sets the current user to active
     * @return mixed
     */
    public function setActive(){
        $endpoint = $this->endpoint . '.setActive';
        $parameters['query']['token'] = $this->token;
        $res = $this->client->request('GET', $endpoint, $parameters);
        return json_decode((string) $res->getBody());
    }

    /**
     * Sets an image for a user WARNING THIS METHOD IS NOT TESTED
     * @param $image - PATH to file to upload
     * @param null $crop_x
     * @param null $crop_y
     * @param null $crop_w
     * @return mixed
     */
    public function setPhoto($image, $crop_x=null, $crop_y=null, $crop_w=null){
        $endpoint = $this->endpoint . '.setPhoto';
        $parameters = ['multipart' => [
            [
                'name' => 'token',
                'contents' => $this->token
            ],
            [
                'name' => 'image',
                'contents' => fopen($image, 'r'),
                'headers' => ['Content-Type' => mime_content_type($image)]
            ]
        ]];
        if(!is_null($crop_x)){
            $parameters['multipart'][] = [
                'name' => 'crop_x',
                'contents' => $crop_x
            ];
        }
        if(!is_null($crop_y)){
            $parameters['multipart'][] = [
                'name' => 'crop_x',
                'contents' => $crop_y
            ];
        }
        if(!is_null($crop_w)){
            $parameters['multipart'][] = [
                'name' => 'crop_x',
                'contents' => $crop_y
            ];
        }
        $res = $this->client->request('POST', $endpoint, $parameters);
        return json_decode((string) $res->getBody());
    }

    /**
     * Sets the presence of the current user
     * @param $presence
     * @return mixed
     */
    public function setPresence($presence){
        $endpoint = $this->endpoint . 'setActive';
        $parameters = ['query' => [
            'token' => $this->token,
            'presence' => $presence
        ]];
        $res = $this->client->request('GET', $endpoint, $parameters);
        return json_decode((string) $res->getBody());
    }
}