<?php
/*
 * MessageMediaWebhooks
 *
 * This file was automatically generated for MessageMedia by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace MessageMediaWebhooksLib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class Headers implements JsonSerializable
{
    /**
     * Example of
     * @maps Account
     * @var string|null $account public property
     */
    public $account;

    /**
     * Constructor to set initial or default values of member properties
     * @param string $account Initialization value for $this->account
     */
    public function __construct()
    {
        if (1 == func_num_args()) {
            $this->account = func_get_arg(0);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['Account'] = $this->account;

        return $json;
    }
}
