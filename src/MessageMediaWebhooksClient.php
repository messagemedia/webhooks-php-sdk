<?php
/*
 * MessageMediaWebhooks
 *
 * This file was automatically generated for MessageMedia by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace MessageMediaWebhooksLib;

use MessageMediaWebhooksLib\Controllers;

/**
 * MessageMediaWebhooks client class
 */
class MessageMediaWebhooksClient
{
    /**
     * Constructor with authentication and configuration parameters
     */
    public function __construct(
        $basicAuthUserName = null,
        $basicAuthPassword = null
    ) {
        Configuration::$basicAuthUserName = $basicAuthUserName ? $basicAuthUserName : Configuration::$basicAuthUserName;
        Configuration::$basicAuthPassword = $basicAuthPassword ? $basicAuthPassword : Configuration::$basicAuthPassword;
    }
    /**
     * Singleton access to Webhooks controller
     * @return Controllers\WebhooksController The *Singleton* instance
     */
    public function getWebhooks()
    {
        return Controllers\WebhooksController::getInstance();
    }
}
