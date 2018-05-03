<?php
/*
 * MessageMediaWebhooks
 *
 * This file was automatically generated for MessageMedia by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace MessageMediaWebhooksLib\Controllers;

use MessageMediaWebhooksLib\APIException;
use MessageMediaWebhooksLib\APIHelper;
use MessageMediaWebhooksLib\Configuration;
use MessageMediaWebhooksLib\Models;
use MessageMediaWebhooksLib\Exceptions;
use MessageMediaWebhooksLib\Http\HttpRequest;
use MessageMediaWebhooksLib\Http\HttpResponse;
use MessageMediaWebhooksLib\Http\HttpMethod;
use MessageMediaWebhooksLib\Http\HttpContext;
use Unirest\Request;

/**
 * @todo Add a general description for this controller.
 */
class APIController extends BaseController
{
    /**
     * @var APIController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return APIController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * This will create a webhook for the specified `events`
     * ### Parameters
     * **list of supported parameters in `template` according to the message type :**
     * you must escape the json for the template parameter. see example .
     * | Data   | parameter name | DR| MO | MO MMS | Comment |
     * |:--|--|--|--|--|--|
     * | **service type**  | $type| ``OK`` |`OK`| `OK`| |
     * | **Message ID**  | $mtId, $messageId| `OK` |`OK`| `OK`| |
     * | **Delivery report ID** |$drId, $reportId | `OK` || | |
     * | **Reply ID**| $moId, $replyId| |`OK`| `OK`||
     * | **Account ID**  | $accountId| `OK` |`OK`| `OK`||
     * | **Message Timestamp**  | $submittedTimestamp| `OK` |`OK`| `OK`||
     * | **Provider Timestamp**  | $receivedTimestamp| `OK` |`OK`| `OK`||
     * | **Message status** | $status| `OK` ||||
     * | **Status code**  | $statusCode| `OK` ||||
     * | **External metadata** | $metadata.get('key')| `OK` |`OK`| `OK`||
     * | **Source address**| $sourceAddress| `OK` |`OK`| `OK`||
     * | **Destination address**| $destinationAddress|  |`OK`| `OK`||
     * | **Message content**| $mtContent, $messageContent| `OK` |`OK`| `OK`||
     * | **Reply Content**| $moContent, $replyContent|  |`OK`| `OK`||
     * | **Retry Count**| $retryCount| `OK` |`OK`| `OK`||
     * **list of allowed  `events` :**
     * you can combine all the events whatever the message type.(at least one Event set otherwise the
     * webhook won't be created)
     * + **events for SMS**
     * + `RECEIVED_SMS`
     * + `OPT_OUT_SMS`
     * + **events for MMS**
     * + `RECEIVED_MMS`
     * + **events for DR**
     * + `ENROUTE_DR`
     * + `EXPIRED_DR`
     * + `REJECTED_DR`
     * + `FAILED_DR`
     * + `DELIVERED_DR`
     * + `SUBMITTED_DR`
     * a **Response 400 is returned when** :
     * <ul>
     * <li>the `url` is not valid </li>
     * <li>the `events` is null/empty </li>
     * <li>the `encoding` is null </li>
     * <li>the `method` is null </li>
     * <li>the `headers` has a `ContentType`  attribute </li>
     * </ul>
     *
     * @param string               $contentType  TODO: type description here
     * @param Models\CreateRequest $body         TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function create(
        $contentType,
        $body
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/v1/webooks/messages';

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'messagesmedia-webhooks',
            'Accept'        => 'application/json',
            'Content-Type'    => $contentType
        );

        //set HTTP basic auth parameters
        Request::auth(Configuration::$basicAuthUserName, Configuration::$basicAuthPassword);

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::post($_queryUrl, $_headers, Request\Body::Json($body));

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new APIException('', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        return $response->body;
    }

    /**
     * This will delete the webhook wuth the give id.
     * a **Response 404 is returned when** :
     * <ul>
     * <li>there is no webhook  with this `webhookId` </li>
     * </ul>
     *
     * @param string $webhookId TODO: type description here
     * @return void response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function deleteDeleteAndUpdateWebhook(
        $webhookId
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/v1/webooks/messages/{webhookId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'webhookId' => $webhookId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'messagesmedia-webhooks'
        );

        //set HTTP basic auth parameters
        Request::auth(Configuration::$basicAuthUserName, Configuration::$basicAuthPassword);

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::DELETE, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::delete($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 404) {
            throw new APIException('', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);
    }

    /**
     * This will retrieve all webhooks for the account we're connected with.
     * a **Response 400 is returned when** :
     * <ul>
     * <li>the `page` query parameter is not valid </li>
     * <li>the `pageSize` query parameter is not valid </li>
     * </ul>
     *
     * @param integer $page     (optional) TODO: type description here
     * @param integer $pageSize (optional) TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function retrieve(
        $page = null,
        $pageSize = null
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/v1/webooks/messages/';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'page'     => $page,
            'pageSize' => $pageSize,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'messagesmedia-webhooks',
            'Accept'        => 'application/json'
        );

        //set HTTP basic auth parameters
        Request::auth(Configuration::$basicAuthUserName, Configuration::$basicAuthPassword);

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new APIException('', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'MessageMediaWebhooksLib\\Models\\RetrieveResponse');
    }

    /**
     * This will update a webhook and returned the updated Webhook.
     * you can update all the attributes individually or together.
     * PS : the new value will override the previous one.
     * ### Parameters
     * + same parameters rules as create webhook apply
     * a **Response 404 is returned when** :
     * <ul>
     * <li>there is no webhook with this `webhookId` </li>
     * </ul>
     * a **Response 400 is returned when** :
     * <ul>
     * <li>all attributes are null </li>
     * <li>events array is empty </li>
     * <li>content-Type is set in the headers instead of using the `encoding` attribute  </li>
     * </ul>
     *
     * @param string               $webhookId    TODO: type description here
     * @param string               $contentType  TODO: type description here
     * @param Models\UpdateRequest $body         TODO: type description here
     * @return void response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function update(
        $webhookId,
        $contentType,
        $body
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/v1/webooks/messages/{webhookId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'webhookId'    => $webhookId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'messagesmedia-webhooks',
            'Content-Type'    => $contentType
        );

        //set HTTP basic auth parameters
        Request::auth(Configuration::$basicAuthUserName, Configuration::$basicAuthPassword);

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::PATCH, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::patch($_queryUrl, $_headers, Request\Body::Json($body));

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 404) {
            throw new APIException('', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);
    }
}
