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
class RetrieveResponse implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var integer $page public property
     */
    public $page;

    /**
     * @todo Write general description for this property
     * @required
     * @var integer $pageSize public property
     */
    public $pageSize;

    /**
     * @todo Write general description for this property
     * @required
     * @var array $pageData public property
     */
    public $pageData;

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $page     Initialization value for $this->page
     * @param integer $pageSize Initialization value for $this->pageSize
     * @param array   $pageData Initialization value for $this->pageData
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->page     = func_get_arg(0);
            $this->pageSize = func_get_arg(1);
            $this->pageData = func_get_arg(2);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['page']     = $this->page;
        $json['pageSize'] = $this->pageSize;
        $json['pageData'] = $this->pageData;

        return $json;
    }
}
