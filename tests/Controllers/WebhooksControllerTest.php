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


}
