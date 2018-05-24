<?php
/*
 * MessageMediaWebhooks
 *
 * This file was automatically generated for MessageMedia by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace MessageMediaWebhooksLib\Tests;

use MessageMediaWebhooksLib\APIException;
use MessageMediaWebhooksLib\Exceptions;
use MessageMediaWebhooksLib\APIHelper;
use MessageMediaWebhooksLib\Models;

class WebhooksControllerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \MessageMediaWebhooksLib\Controllers\WebhooksController Controller instance
     */
    protected static $controller;

    /**
     * @var HttpCallBackCatcher Callback
     */
    protected $httpResponse;

    /**
     * Setup test class
     */
    public static function setUpBeforeClass()
    {
        $client = new \MessageMediaWebhooksLib\MessageMediaWebhooksClient();
        self::$controller = $client->getWebhooks();
    }

    /**
     * Setup test
     */
    protected function setUp()
    {
        $this->httpResponse = new HttpCallBackCatcher();
    }

    /**
     * Update a webhook. You can update individual attributes or all of them by submitting a PATCH request to the /webhooks/messages endpoint (the same endpoint used above to delete a webhook)
A successful request to the retrieve webhook endpoint will return a response body as follows:
```
{
    "url": "https://webhook.com",
    "method": "POST",
    "id": "04442623-0961-464e-9cbc-ec50804e0413",
    "encoding": "JSON",
    "events": [
        "RECEIVED_SMS"
    ],
    "headers": {},
    "template": "{\"id\":\"$mtId\", \"status\":\"$statusCode\"}"
}
```
*Note: Only pre-created webhooks can be deleted. If an invalid or non existent webhook ID parameter is specified in the request, then a HTTP 404 Not Found response will be returned.*
     */
    public function testUpdateWebhook1()
    {
        // Parameters for the API call
        $webhookId = 'a7f11bb0-f299-4861-a5ca-9b29d04bc5ad';
        $body = TestHelper::getJsonMapper()->mapClass(json_decode(
            '    {        \"url\": \"https://myurl.com\",        \"method\": \"POST\",        \"encoding\": \"FOR" .
            "M_ENCODED\",        \"events\": [            \"ENROUTE_DR\"        ],        \"template\": \"{\\\"id" .
            "\\\":\\\"$mtId\\\", \\\"status\\\":\\\"$statusCode\\\"}\"    }'),
            'MessageMediaWebhooksLib\\Models\\UpdateWebhookRequest'
        );

        // Set callback and perform API call
        $result = null;
        self::$controller->setHttpCallBack($this->httpResponse);
        try {
            $result = self::$controller->updateWebhook($webhookId, $body);
        } catch (APIException $e) {
        }

        // Test response code
        $this->assertEquals(
            200,
            $this->httpResponse->getResponse()->getStatusCode(),
            "Status is not 200"
        );

        $this->assertCount(
            count($headers),
            $this->httpResponse->getResponse()->getHeaders(),
            "Headers do not match strictly"
        );
    }
}
