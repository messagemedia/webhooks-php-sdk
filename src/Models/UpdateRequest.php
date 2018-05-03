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
class UpdateRequest implements JsonSerializable
{
    /**
     * target for the webhook. http and https are authorized
     * @var string|null $url public property
     */
    public $url;

    /**
     * authorized webhook methods  :  GET, POST, PUT, DELETE, PATCH
     * @var string|null $method public property
     */
    public $method;

    /**
     * JSON, FORM_ENCODED, XML
     * @var string|null $encoding public property
     */
    public $encoding;

    /**
     * customized headers.no content Type header because we set it in the encoding attribute. an example
     * belowf
     * @var object|null $headers public property
     */
    public $headers;

    /**
     * list of events we want to suscribe to. see docs
     * @var array|null $events public property
     */
    public $events;

    /**
     * expected template. see doc for possibilitie
     * @var string|null $template public property
     */
    public $template;

    /**
     * Constructor to set initial or default values of member properties
     * @param string $url      Initialization value for $this->url
     * @param string $method   Initialization value for $this->method
     * @param string $encoding Initialization value for $this->encoding
     * @param object $headers  Initialization value for $this->headers
     * @param array  $events   Initialization value for $this->events
     * @param string $template Initialization value for $this->template
     */
    public function __construct()
    {
        if (6 == func_num_args()) {
            $this->url      = func_get_arg(0);
            $this->method   = func_get_arg(1);
            $this->encoding = func_get_arg(2);
            $this->headers  = func_get_arg(3);
            $this->events   = func_get_arg(4);
            $this->template = func_get_arg(5);
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
        $json['headers']  = $this->headers;
        $json['events']   = $this->events;
        $json['template'] = $this->template;

        return $json;
    }
}
