# MessageMedia Webhooks PHP SDK
[![Travis Build Status](https://api.travis-ci.org/messagemedia/webhooks-php-sdk.svg?branch=master)](https://travis-ci.org/messagemedia/webhooks-php-sdk)

The MessageMedia Webhooks allows you to subscribe to one or several events and when one of those events is triggered, an HTTP request is sent to the URL of your choice along with the message or payload. In simpler terms, it allows applications to "speak" to one another and get notified automatically when something new happens.

## ⭐️ Installing via Composer
Run the Composer command to install the latest stable version of the Messages SDK:
```
composer require messagemedia/webhooks-sdk
```

## 🎬 Get Started
It's easy to get started. Simply enter the API Key and secret you obtained from the [MessageMedia Developers Portal](https://developers.messagemedia.com) into the code snippet below and a mobile number you wish to send to.

### 🚀 Create a webhook
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

### 📥 Retrieve all webhooks
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

### 🔄 Update a webhook
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

### ❌ Delete a webhook
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

## 📕 Documentation
Check out the [full API documentation](DOCUMENTATION.md) for more detailed information.

## 😕 Need help?
Please contact developer support at developers@messagemedia.com or check out the developer portal at [developers.messagemedia.com](https://developers.messagemedia.com/)

## 📃 License
Apache License. See the [LICENSE](LICENSE) file.
