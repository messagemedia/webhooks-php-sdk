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
class CreateRequest implements JsonSerializable
{
    /**
     * target for the webhook. http and https are authorized
     * @required
     * @var string $url public property
     */
    public $url;

    /**
     * authorized webhook methods  :  GET, POST, PUT, DELETE, PATCH
     * @required
     * @var string $method public property
     */
    public $method;

    /**
     * JSON, FORM_ENCODED, XML
     * @required
     * @var string $encoding public property
     */
    public $encoding;

    /**
     * list of events we want to suscribe to. see docs
     * @required
     * @var array $events public property
     */
    public $events;

    /**
     * expected template. see doc for possibilities
     * @required
     * @var string $template public property
     */
    public $template;

    /**
     * customized headers.no content Type header because we set it in the encoding attribute. an example
     * below
     * @var \MessageMediaWebhooksLib\Models\Headers|null $headers public property
     */
    public $headers;

    /**
     * Constructor to set initial or default values of member properties
     * @param string  $url      Initialization value for $this->url
     * @param string  $method   Initialization value for $this->method
     * @param string  $encoding Initialization value for $this->encoding
     * @param array   $events   Initialization value for $this->events
     * @param string  $template Initialization value for $this->template
     * @param Headers $headers  Initialization value for $this->headers
     */
    public function __construct()
    {
        if (6 == func_num_args()) {
            $this->url      = func_get_arg(0);
            $this->method   = func_get_arg(1);
            $this->encoding = func_get_arg(2);
            $this->events   = func_get_arg(3);
            $this->template = func_get_arg(4);
            $this->headers  = func_get_arg(5);
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
        $json['headers']  = $this->headers;

        return $json;
    }
}
