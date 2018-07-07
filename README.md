# MessageMedia Webhooks PHP SDK
[![Travis Build Status](https://api.travis-ci.org/messagemedia/webhooks-php-sdk.svg?branch=master)](https://travis-ci.org/messagemedia/webhooks-php-sdk)
[![Pull Requests Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat)](http://makeapullrequest.com)
[![PHP version](https://badge.fury.io/ph/messagemedia%2Fwebhooks-sdk.svg)](https://badge.fury.io/ph/messagemedia%2Fwebhooks-sdk)

The MessageMedia Webhooks allows you to subscribe to one or several events and when one of those events is triggered, an HTTP request is sent to the URL of your choice along with the message or payload. In simpler terms, it allows applications to "speak" to one another and get notified automatically when something new happens.

![Webhooks Flow](http://i66.tinypic.com/2ufxf81.jpg)

## Table of Contents
* [Authentication](#closed_lock_with_key-authentication)
* [Errors](#interrobang-errors)
* [Information](#newspaper-information)
  * [Slack and Mailing List](#slack-and-mailing-list)
  * [Bug Reports](#bug-reports)
  * [Contributing](#contributing)
* [Installation](#star-installation)
* [Get Started](#clapper-get-started)
* [API Documentation](#closed_book-api-documentation)
* [Need help?](#confused-need-help)
* [License](#page_with_curl-license)

## :closed_lock_with_key: Authentication

Authentication is done via API keys. Sign up at https://developers.messagemedia.com/register/ to get your API keys.

Requests are authenticated using HTTP Basic Auth or HMAC. Provide your API key as the auth_user_name and API secret as the auth_password.

## :interrobang: Errors

Our API returns standard HTTP success or error status codes. For errors, we will also include extra information about what went wrong encoded in the response as JSON. The most common status codes are listed below.

#### HTTP Status Codes

| Code      | Title       | Description |
|-----------|-------------|-------------|
| 400 | Invalid Request | The request was invalid |
| 401 | Unauthorized | Your API credentials are invalid |
| 403 | Disabled feature | Feature not enabled |
| 404 | Not Found |	The resource does not exist |
| 50X | Internal Server Error | An error occurred with our API |

## :newspaper: Information

#### Slack and Mailing List

If you have any questions, comments, or concerns, please join our Slack channel:
https://developers.messagemedia.com/collaborate/slack/

Alternatively you can email us at:
developers@messagemedia.com

#### Bug reports

If you discover a problem with the SDK, we would like to know about it. You can raise an [issue](https://github.com/messagemedia/signingkeys-nodejs-sdk/issues) or send an email to: developers@messagemedia.com

#### Contributing

We welcome your thoughts on how we could best provide you with SDKs that would simplify how you consume our services in your application. You can fork and create pull requests for any features you would like to see or raise an [issue](https://github.com/messagemedia/signingkeys-nodejs-sdk/issues)

## :star: Installation
Run the Composer command to install the latest stable version of the Messages SDK:
```
composer require messagemedia/webhooks-sdk
```

## :clapper: Get Started
It's easy to get started. Simply enter the API Key and secret you obtained from the [MessageMedia Developers Portal](https://developers.messagemedia.com) into the code snippet below.

### Create a webhook
```php
<?php
require_once('vendor/autoload.php');

$basicAuthUserName = 'YOUR_API_KEY'; // The username to use with basic authentication
$basicAuthPassword = 'YOUR_SECRET_KEY'; // The password to use with basic authentication

$client = new MessageMediaWebhooksLib\MessageMediaWebhooksClient($basicAuthUserName, $basicAuthPassword);

$webhooks = $client->getWebhooks();

$body = new MessageMediaWebhooksLib\Models\CreateWebhookRequest();
$body->url = "http://webhook.com/asdasd";
$body->method = "POST";
$body->encoding = "JSON";
$body->headers = array("x-your-webhook-custom-header" => "custom-value");
$body->events = array("RECEIVED_SMS");
$body->template = '{"id":"$mtId","status":"$statusCode"}';

$result = $webhooks->createWebhook($body);
```

### Retrieve all webhooks
```php
<?php
require_once('vendor/autoload.php');

$basicAuthUserName = 'YOUR_API_KEY'; // The username to use with basic authentication
$basicAuthPassword = 'YOUR_SECRET_KEY'; // The password to use with basic authentication

$client = new MessageMediaWebhooksLib\MessageMediaWebhooksClient($basicAuthUserName, $basicAuthPassword);

$webhooks = $client->getWebhooks();

$page  =  0;
$pageSize  =  10;

$result  =  $webhooks->retrieveWebhook($page, $pageSize);
print_r($result);
```

### Update a webhook
You can get a webhook ID by looking at the `id` of each webhook created from the response of the above example.
```php
<?php
require_once('vendor/autoload.php');

$basicAuthUserName = 'YOUR_API_KEY'; // The username to use with basic authentication
$basicAuthPassword = 'YOUR_SECRET_KEY'; // The password to use with basic authentication

$client = new MessageMediaWebhooksLib\MessageMediaWebhooksClient($basicAuthUserName, $basicAuthPassword);

$webhooks = $client->getWebhooks();

$webhookId = "YOUR_WEBHOOK_ID";

$body = new MessageMediaWebhooksLib\Models\CreateWebhookRequest();
$body->url = "http://webhook.com/some_new_url";
$body->method = "POST";
$body->encoding = "JSON";
$body->headers = array("Account" => "teasdasdst");
$body->events = array("RECEIVED_SMS");
$body->template = '{"id":"$mtId","status":"$statusCode"}';


$result = $webhooks->updateWebhook($webhookId, $body);
```

### Delete a webhook
You can get a webhook ID by looking at the `id` of each webhook created from the response of the retrieve webhooks example.
```php
<?php
require_once('vendor/autoload.php');

$basicAuthUserName = 'YOUR_API_KEY'; // The username to use with basic authentication
$basicAuthPassword = 'YOUR_SECRET_KEY'; // The password to use with basic authentication

$client = new MessageMediaWebhooksLib\MessageMediaWebhooksClient($basicAuthUserName, $basicAuthPassword);

$webhooks = $client->getWebhooks();

$webhookId = "YOUR_WEBHOOK_ID";

$webhooks->deleteWebhook($webhookId);
```

## :closed_book: API Reference Documentation
Check out the [full API documentation](https://developers.messagemedia.com/code/webhooks-api-documentation/) for more detailed information.

## :confused: Need help?
Please contact developer support at developers@messagemedia.com or check out the developer portal at [developers.messagemedia.com](https://developers.messagemedia.com/)

## :page_with_curl: License
Apache License. See the [LICENSE](LICENSE) file.
