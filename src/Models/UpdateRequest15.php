<?php
/*
 * MessageMediaWebhooks
 *

 */

namespace MessageMediaWebhooksLib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class UpdateRequest15 implements JsonSerializable
{
    /**
     * target for the webhook. http and https are authorized
     * @var string|null $url public property
     */
    public $url;

    /**
     * expected template. see doc for possibilitie
     * @var string|null $template public property
     */
    public $template;

    /**
     * Constructor to set initial or default values of member properties
     * @param string $url      Initialization value for $this->url
     * @param string $template Initialization value for $this->template
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->url      = func_get_arg(0);
            $this->template = func_get_arg(1);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['url']      = $this->url;
        $json['template'] = $this->template;

        return $json;
    }
}
