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
class WebhooksController extends BaseController
{
    /**
     * @var WebhooksController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return WebhooksController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * Create a webhook for one or more of the specified events.
     * A webhook would typically have the following structure:
     * ```
     * {
     * "url": "http://webhook.com",
     * "method": "POST",
     * "encoding": "JSON",
     * "headers": {
     * "Account": "DeveloperPortal7000"
     * },
     * "events": [
     * "RECEIVED_SMS"
     * ],
     * "template": "{\"id\":\"$mtId\",\"status\":\"$statusCode\"}"
     * }
     * ```
     * A valid webhook must consist of the following properties:
     * - ```url``` The configured URL which will trigger the webhook when a selected event occurs.
     * - ```method``` The methods to map CRUD (create, retrieve, update, delete) operations to HTTP
     * requests.
     * - ```encoding``` The format in which the payload will be returned. You can choose from ```JSON```,
     * ```FORM_ENCODED``` or ```XML```. This will automatically add the Content-Type header for you so you
     * don't have to add it again in the `headers` property.
     * - ```headers``` HTTP header fields which provide required information about the request or response,
     * or about the object sent in the message body. This should not include the `Content-Type` header.
     * - ```events``` Event or events that will trigger the webhook. Atleast one event should be present.
     * - ```template``` The structure of the payload that will be returned.
     * #### Types of Events
     * You can select all of the events (listed below) or combine them in whatever way you like but atleast
     * one event must be used. Otherwise, the webhook won't be created.
     * A webhook will be triggered when any one or more of the events occur:
     * + **SMS**
     * + `RECEIVED_SMS` Receive an SMS
     * + `OPT_OUT_SMS` Opt-out occured
     * + **MMS**
     * + `RECEIVED_MMS` Receive an MMS
     * + **DR (Delivery Reports)**
     * + `ENROUTE_DR` Message is enroute
     * + `EXPIRED_DR` Message has expired
     * + `REJECTED_DR` Message is rejected
     * + `FAILED_DR` Message has failed
     * + `DELIVERED_DR` Message is delivered
     * + `SUBMITTED_DR` Message is submitted
     * #### Template Parameters
     * You can choose what to include in the data that will be sent as the payload via the Webhook.
     * Keep in my mind, you must escape the JSON in the template value (see example above).
     * The table illustrates a list of all the parameters that can be included in the template and which
     * event types it can be applied to.
     * | Data  | Parameter Name | Example | Event Type |
     * |:--|--|--|--|--|
     * | **Service Type**  | $type| `SMS` | `DR` `MO` `MO MMS` |
     * | **Message ID**  | $mtId, $messageId| `877c19ef-fa2e-4cec-827a-e1df9b5509f7` | `DR` `MO` `MO MMS`|
     * | **Delivery Report ID** |$drId, $reportId| `01e1fa0a-6e27-4945-9cdb-18644b4de043` | `DR` |
     * | **Reply ID**| $moId, $replyId| `a175e797-2b54-468b-9850-41a3eab32f74` | `MO` `MO MMS` |
     * | **Account ID**  | $accountId| `DeveloperPortal7000` | `DR` `MO` `MO MMS` |
     * | **Message Timestamp**  | $submittedTimestamp| `2016-12-07T08:43:00.850Z` | `DR` `MO` `MO MMS` |
     * | **Provider Timestamp**  | $receivedTimestamp| `2016-12-07T08:44:00.850Z` | `DR` `MO` `MO MMS` |
     * | **Message Status** | $status| `enroute` | `DR` |
     * | **Status Code**  | $statusCode| `200` | `DR` |
     * | **External Metadata** | $metadata.get('key')| `name` | `DR` `MO` `MO MMS` |
     * | **Source Address**| $sourceAddress| `+61491570156` | `DR` `MO` `MO MMS` |
     * | **Destination Address**| $destinationAddress| `+61491593156` | `MO` `MO MMS` |
     * | **Message Content**| $mtContent, $messageContent| `Hi Derp` | `DR` `MO` `MO MMS` |
     * | **Reply Content**| $moContent, $replyContent| `Hello Derpina` | `MO` `MO MMS` |
     * | **Retry Count**| $retryCount| `1` | `DR` `MO` `MO MMS` |
     * *Note: A 400 response will be returned if the `url` is invalid, the `events`, `encoding` or `method`
     * is null or the `headers` has a Content-Type  attribute.*
     *
     * @param Models\CreateWebhookRequest $body TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createWebhook(
        $body
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/v1/webhooks/messages';

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'messagesmedia-webhooks',
            'Accept'        => 'application/json',
            'content-type'  => 'application/json; charset=utf-8'
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
            throw new Exceptions\CreateWebhook400ResponseException(
                'Unexpected error in API call. See HTTP response body for details.',
                $_httpContext
            );
        }

        if ($response->code == 409) {
            throw new Exceptions\CreateWebhook400ResponseException(
                'Unexpected error in API call. See HTTP response body for details.',
                $_httpContext
            );
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        return $response->body;
    }

    /**
     * Retrieve all the webhooks created for the connected account.
     * A successful request to the retrieve webhook endpoint will return a response body as follows:
     * ```
     * {
     * "page": 0,
     * "pageSize": 100,
     * "pageData": [
     * {
     * "url": "https://webhook.com",
     * "method": "POST",
     * "id": "8805c9d8-bef7-41c7-906a-69ede93aa024",
     * "encoding": "JSON",
     * "events": [
     * "RECEIVED_SMS"
     * ],
     * "headers": {},
     * "template": "{\"id\":\"$mtId\", \"status\":\"$statusCode\"}"
     * }
     * ]
     * }
     * ```
     * *Note: Response 400 is returned when the `page` query parameter is not valid or the `pageSize` query
     * parameter is not valid.*
     *
     * @param integer $page     (optional) TODO: type description here
     * @param integer $pageSize (optional) TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function retrieveWebhook(
        $page = null,
        $pageSize = null
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/v1/webhooks/messages/';

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
            throw new Exceptions\RetrieveWebhook400ResponseException(
                'Unexpected error in API call. See HTTP response body for details.',
                $_httpContext
            );
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        return $response->body;
    }

    /**
     * Delete a webhook that was previously created for the connected account.
     * A webhook can be cancelled by appending the UUID of the webhook to the endpoint and submitting a
     * DELETE request to the /webhooks/messages endpoint.
     * *Note: Only pre-created webhooks can be deleted. If an invalid or non existent webhook ID parameter
     * is specified in the request, then a HTTP 404 Not Found response will be returned.*
     *
     * @param string $webhookId TODO: type description here
     * @return void response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function deleteWebhook(
        $webhookId
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/v1/webhooks/messages/{webhookId}';

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
     * Update a webhook. You can update individual attributes or all of them by submitting a PATCH request
     * to the /webhooks/messages endpoint (the same endpoint used above to delete a webhook)
     * A successful request to the retrieve webhook endpoint will return a response body as follows:
     * ```
     * {
     * "url": "https://webhook.com",
     * "method": "POST",
     * "id": "04442623-0961-464e-9cbc-ec50804e0413",
     * "encoding": "JSON",
     * "events": [
     * "RECEIVED_SMS"
     * ],
     * "headers": {},
     * "template": "{\"id\":\"$mtId\", \"status\":\"$statusCode\"}"
     * }
     * ```
     * *Note: Only pre-created webhooks can be deleted. If an invalid or non existent webhook ID parameter
     * is specified in the request, then a HTTP 404 Not Found response will be returned.*
     *
     * @param string                      $webhookId TODO: type description here
     * @param Models\UpdateWebhookRequest $body      TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function updateWebhook(
        $webhookId,
        $body
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/v1/webhooks/messages/{webhookId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'webhookId' => $webhookId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'messagesmedia-webhooks',
            'Accept'        => 'application/json',
            'content-type'  => 'application/json; charset=utf-8'
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
        if ($response->code == 400) {
            throw new Exceptions\UpdateWebhook400ResponseException(
                'Unexpected error in API call. See HTTP response body for details.',
                $_httpContext
            );
        }

        if ($response->code == 404) {
            throw new APIException('', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        return $response->body;
    }
}
