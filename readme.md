# About Slack-API
This project is a simple wrapper written in PHP using Guzzle 6 to request API endpoints
as defined at [Slack Api documentation](https://api.slack.com/methods). This is still
a work in progress at the current point in the time, and I will filling the missing areas
as I go along and when I need them in my own projects. So use at your own risk.

*Currently does not implement any of the RTM methods*

##What has been implemented
Currently I have implemented the methods under the following headers found in the 
[Slack Api documentation](https://api.slack.com/methods).
####`Web` Namespace
 - API
 - Auth
 - Bots
 - Channels
 - Chat
 - Group
 - IM
 - Users
 
 ####`Auth` Namespace
 - OAuth
 
 ##Including in your project 
`composer require suspectdoubloon/slack-api`

and don't forget to include the autoload file in your project

`include('vendor/autoload.php');`

##Using Slack-api
First using the `OAuthClient` in the auth namespace to generate an access token, more
information can be found at [Slack Auth Documentation](https://api.slack.com/docs/oauth)
The following below will required your client id, and client secret generated when you've
made you slack application. The following also uses a code received from a callback from
the [add to slack button](https://api.slack.com/docs/slack-button).
```
use SuspectDoubloon\Slack\Auth\OAuthClient;
$oauth = new OAuthClient($client_id, $client_secret); //This are given to you by slack when you created the app
$res = $ouath->access($code); //Returns mixed, is the result from json_decode received from the slack api
```
All methods in this package use the results from `json_decode`.

Once you have generated the access token you can now use any of the classes located under the web namespace.
See above for the currently available methods. Below is an example of getting a channel list.
```
use SuspectDoubloon\Slack\Web\ChannelClient;
$channelClient = new ChannelClient($token);
$channels = $channelClient->lists(true)->channels;
```
All methods will have the same number of arguments as the methods are defined as the slack API.
The only exception is endpoints which send messages. Which will use an array for the argument list.


## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).