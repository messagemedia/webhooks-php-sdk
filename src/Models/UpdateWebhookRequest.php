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
class UpdateWebhookRequest implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var string $url public property
     */
    public $url;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $method public property
     */
    public $method;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $encoding public property
     */
    public $encoding;

    /**
     * @todo Write general description for this property
     * @required
     * @var array $events public property
     */
    public $events;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $template public property
     */
    public $template;

    /**
     * Constructor to set initial or default values of member properties
     * @param string $url      Initialization value for $this->url
     * @param string $method   Initialization value for $this->method
     * @param string $encoding Initialization value for $this->encoding
     * @param array  $events   Initialization value for $this->events
     * @param string $template Initialization value for $this->template
     */
    public function __construct()
    {
        if (5 == func_num_args()) {
            $this->url      = func_get_arg(0);
            $this->method   = func_get_arg(1);
            $this->encoding = func_get_arg(2);
            $this->events   = func_get_arg(3);
            $this->template = func_get_arg(4);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['url']      = $this->url;
        $json['method']   = $this->method;
        $json['encoding'] = $this->encoding;
        $json['events']   = $this->events;
        $json['template'] = $this->template;

        return $json;
    }
}
