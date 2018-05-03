<?php
/*
 * MessageMediaWebhooks
 *

 */

namespace MessageMediaWebhooksLib\Tests;

use MessageMediaWebhooksLib\APIException;
use MessageMediaWebhooksLib\Exceptions;
use MessageMediaWebhooksLib\APIHelper;
use MessageMediaWebhooksLib\Models;

class APIControllerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \MessageMediaWebhooksLib\Controllers\APIController Controller instance
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
        self::$controller = $client->getClient();
    }

    /**
     * Setup test
     */
    protected function setUp()
    {
        $this->httpResponse = new HttpCallBackCatcher();
    }

    /**
     * This will delete the webhook wuth the give id.
a **Response 404 is returned when** :
    <ul>
     <li>there is no webhook  with this `webhookId` </li>
    </ul>
     */
    public function testDeleteDeleteAndUpdateWebhook1()
    {
        // Parameters for the API call
        $webhookId = 'a7f11bb0-f299-4861-a5ca-9b29d04bc5ad';

        // Set callback and perform API call
        self::$controller->setHttpCallBack($this->httpResponse);
        try {
            self::$controller->deleteDeleteAndUpdateWebhook($webhookId);
        } catch (APIException $e) {
        }

        // Test response code
        $this->assertEquals(
            204,
            $this->httpResponse->getResponse()->getStatusCode(),
            "Status is not 204"
        );

        // Test headers
        $headers = [];
        $headers['Content-Type'] = null ;
        
        $this->assertTrue(
            TestHelper::areHeadersProperSubsetOf($headers, $this->httpResponse->getResponse()->getHeaders(), true),
            "Headers do not match"
        );
    }

    /**
     * This will retrieve all webhooks for the account we're connected with.
a **Response 400 is returned when** :
    <ul>
     <li>the `page` query parameter is not valid </li>
     <li>the `pageSize` query parameter is not valid </li>
    </ul>
     */
    public function testRetrieve1()
    {
        // Parameters for the API call
        $page = '1';
        $pageSize = '10';

        // Set callback and perform API call
        $result = null;
        self::$controller->setHttpCallBack($this->httpResponse);
        try {
            $result = self::$controller->retrieve($page, $pageSize);
        } catch (APIException $e) {
        }

        // Test response code
        $this->assertEquals(
            200,
            $this->httpResponse->getResponse()->getStatusCode(),
            "Status is not 200"
        );

        // Test headers
        $headers = [];
        $headers['Content-Type'] = null ;
        
        $this->assertTrue(
            TestHelper::areHeadersProperSubsetOf($headers, $this->httpResponse->getResponse()->getHeaders(), true),
            "Headers do not match"
        );

        // Test whether the captured response is as we expected
        $this->assertNotNull($result, "Result does not exist");

        $this->assertTrue(
            TestHelper::isJsonObjectProperSubsetOf(
                "    {    \"page\": 0,    \"pageSize\": 100,    \"pageData\": [{    \"id\": \"6e2c61df-d30a-4555-82a5" .
                "-0e79822d8f53\",    \"url\": \"http://myurl.com\",    \"method\": \"POST\",    \"encoding\": \"FORM_" .
                "ENCODED\",    \"headers\": {    \"Account\": \"FunGuys\"    },    \"template\": \"id=$mtId&status=$s" .
                "tatusCode\",    \"events\": [    \"ENROUTE_DR\",    \"DELIVERED_DR\"    ]    }, {    \"id\": \"6e2c6" .
                "1df-d30a-4555-82a5-0e79822d8f53\",    \"url\": \"http://myurl.com\",    \"method\": \"POST\",    \"e" .
                "ncoding\": \"XML\",    \"headers\": {    \"Account\": \"FunGuys\"    },    \"template\": \"<content>" .
                "<id> $mtId < /id> <status > $statusCode < /status> </content>\",    \"events\": [    \"ENROUTE_DR\"," .
                "    \"DELIVERED_DR\"    ]    }]    }",
                $this->httpResponse->getResponse()->getRawBody(),
                true,
                true,
                false
            ),
            "Response body does not match in keys and/or values"
        );
    }
}
