# Getting started

TODO: Add a description

## How to Build

The generated code has dependencies over external libraries like UniRest. These dependencies are defined in the ```composer.json``` file that comes with the SDK. 
To resolve these dependencies, we use the Composer package manager which requires PHP greater than 5.3.2 installed in your system. 
Visit [https://getcomposer.org/download/](https://getcomposer.org/download/) to download the installer file for Composer and run it in your system. 
Open command prompt and type ```composer --version```. This should display the current version of the Composer installed if the installation was successful.

* Using command line, navigate to the directory containing the generated files (including ```composer.json```) for the SDK. 
* Run the command ```composer install```. This should install all the required dependencies and create the ```vendor``` directory in your project directory.

![Building SDK - Step 1](https://apidocs.io/illustration/php?step=installDependencies&workspaceFolder=MessageMediaWebhooks-PHP)

### [For Windows Users Only] Configuring CURL Certificate Path in php.ini

CURL used to include a list of accepted CAs, but no longer bundles ANY CA certs. So by default it will reject all SSL certificates as unverifiable. You will have to get your CA's cert and point curl at it. The steps are as follows:

1. Download the certificate bundle (.pem file) from [https://curl.haxx.se/docs/caextract.html](https://curl.haxx.se/docs/caextract.html) on to your system.
2. Add curl.cainfo = "PATH_TO/cacert.pem" to your php.ini file located in your php installation. “PATH_TO” must be an absolute path containing the .pem file.

```ini
[curl]
; A default value for the CURLOPT_CAINFO option. This is required to be an
; absolute path.
;curl.cainfo =
```

## How to Use

The following section explains how to use the MessageMediaWebhooks library in a new project.

### 1. Open Project in an IDE

Open an IDE for PHP like PhpStorm. The basic workflow presented here is also applicable if you prefer using a different editor or IDE.

![Open project in PHPStorm - Step 1](https://apidocs.io/illustration/php?step=openIDE&workspaceFolder=MessageMediaWebhooks-PHP)

Click on ```Open``` in PhpStorm to browse to your generated SDK directory and then click ```OK```.

![Open project in PHPStorm - Step 2](https://apidocs.io/illustration/php?step=openProject0&workspaceFolder=MessageMediaWebhooks-PHP)     

### 2. Add a new Test Project

Create a new directory by right clicking on the solution name as shown below:

![Add a new project in PHPStorm - Step 1](https://apidocs.io/illustration/php?step=createDirectory&workspaceFolder=MessageMediaWebhooks-PHP)

Name the directory as "test"

![Add a new project in PHPStorm - Step 2](https://apidocs.io/illustration/php?step=nameDirectory&workspaceFolder=MessageMediaWebhooks-PHP)
   
Add a PHP file to this project

![Add a new project in PHPStorm - Step 3](https://apidocs.io/illustration/php?step=createFile&workspaceFolder=MessageMediaWebhooks-PHP)

Name it "testSDK"

![Add a new project in PHPStorm - Step 4](https://apidocs.io/illustration/php?step=nameFile&workspaceFolder=MessageMediaWebhooks-PHP)

Depending on your project setup, you might need to include composer's autoloader in your PHP code to enable auto loading of classes.

```PHP
require_once "../vendor/autoload.php";
```

It is important that the path inside require_once correctly points to the file ```autoload.php``` inside the vendor directory created during dependency installations.

![Add a new project in PHPStorm - Step 4](https://apidocs.io/illustration/php?step=projectFiles&workspaceFolder=MessageMediaWebhooks-PHP)

After this you can add code to initialize the client library and acquire the instance of a Controller class. Sample code to initialize the client library and using controller methods is given in the subsequent sections.

### 3. Run the Test Project

To run your project you must set the Interpreter for your project. Interpreter is the PHP engine installed on your computer.

Open ```Settings``` from ```File``` menu.

![Run Test Project - Step 1](https://apidocs.io/illustration/php?step=openSettings&workspaceFolder=MessageMediaWebhooks-PHP)

Select ```PHP``` from within ```Languages & Frameworks```

![Run Test Project - Step 2](https://apidocs.io/illustration/php?step=setInterpreter0&workspaceFolder=MessageMediaWebhooks-PHP)

Browse for Interpreters near the ```Interpreter``` option and choose your interpreter.

![Run Test Project - Step 3](https://apidocs.io/illustration/php?step=setInterpreter1&workspaceFolder=MessageMediaWebhooks-PHP)

Once the interpreter is selected, click ```OK```

![Run Test Project - Step 4](https://apidocs.io/illustration/php?step=setInterpreter2&workspaceFolder=MessageMediaWebhooks-PHP)

To run your project, right click on your PHP file inside your Test project and click on ```Run```

![Run Test Project - Step 5](https://apidocs.io/illustration/php?step=runProject&workspaceFolder=MessageMediaWebhooks-PHP)

## How to Test

Unit tests in this SDK can be run using PHPUnit. 

1. First install the dependencies using composer including the `require-dev` dependencies.
2. Run `vendor\bin\phpunit --verbose` from commandline to execute tests. If you have 
   installed PHPUnit globally, run tests using `phpunit --verbose` instead.

You can change the PHPUnit test configuration in the `phpunit.xml` file.

## Initialization

### Authentication
In order to setup authentication and initialization of the API client, you need the following information.

| Parameter | Description |
|-----------|-------------|
| basicAuthUserName | The username to use with basic authentication |
| basicAuthPassword | The password to use with basic authentication |



API client can be initialized as following.

```php
$basicAuthUserName = 'basicAuthUserName'; // The username to use with basic authentication
$basicAuthPassword = 'basicAuthPassword'; // The password to use with basic authentication

$client = new MessageMediaWebhooksLib\MessageMediaWebhooksClient($basicAuthUserName, $basicAuthPassword);
```


# Class Reference

## <a name="list_of_controllers"></a>List of Controllers

* [WebhooksController](#webhooks_controller)

## <a name="webhooks_controller"></a>![Class: ](https://apidocs.io/img/class.png ".WebhooksController") WebhooksController

### Get singleton instance

The singleton instance of the ``` WebhooksController ``` class can be accessed from the API Client.

```php
$webhooks = $client->getWebhooks();
```

### <a name="create_webhook"></a>![Method: ](https://apidocs.io/img/method.png ".WebhooksController.createWebhook") createWebhook

> Create a webhook for one or more of the specified events.
> A webhook would typically have the following structure:
> ```
> {
>   "url": "http://webhook.com",
>   "method": "POST",
>   "encoding": "JSON",
>   "headers": {
>     "Account": "DeveloperPortal7000"
>   },
>   "events": [
>     "RECEIVED_SMS"
>   ],
>   "template": "{\"id\":\"$mtId\",\"status\":\"$statusCode\"}"
> }
> ```
> A valid webhook must consist of the following properties:
> - ```url``` The configured URL which will trigger the webhook when a selected event occurs.
> - ```method``` The methods to map CRUD (create, retrieve, update, delete) operations to HTTP requests.
> - ```encoding``` The format in which the payload will be returned. You can choose from ```JSON```, ```FORM_ENCODED``` or ```XML```. This will automatically add the Content-Type header for you so you don't have to add it again in the `headers` property.
> - ```headers``` HTTP header fields which provide required information about the request or response, or about the object sent in the message body. This should not include the `Content-Type` header.
> - ```events``` Event or events that will trigger the webhook. Atleast one event should be present.
> - ```template``` The structure of the payload that will be returned.
> #### Types of Events
> You can select all of the events (listed below) or combine them in whatever way you like but atleast one event must be used. Otherwise, the webhook won't be created.
> A webhook will be triggered when any one or more of the events occur:
> + **SMS**
>     + `RECEIVED_SMS` Receive an SMS
>     + `OPT_OUT_SMS` Opt-out occured
> + **MMS**
>     + `RECEIVED_MMS` Receive an MMS
> + **DR (Delivery Reports)**
>     + `ENROUTE_DR` Message is enroute
>     + `EXPIRED_DR` Message has expired
>     + `REJECTED_DR` Message is rejected
>     + `FAILED_DR` Message has failed 
>     + `DELIVERED_DR` Message is delivered
>     + `SUBMITTED_DR` Message is submitted
> #### Template Parameters
> You can choose what to include in the data that will be sent as the payload via the Webhook.
> Keep in my mind, you must escape the JSON in the template value (see example above).
> The table illustrates a list of all the parameters that can be included in the template and which event types it can be applied to.
> | Data  | Parameter Name | Example | Event Type |
> |:--|--|--|--|--|
> | **Service Type**  | $type| `SMS` | `DR` `MO` `MO MMS` |
> | **Message ID**  | $mtId, $messageId| `877c19ef-fa2e-4cec-827a-e1df9b5509f7` | `DR` `MO` `MO MMS`|
> | **Delivery Report ID** |$drId, $reportId| `01e1fa0a-6e27-4945-9cdb-18644b4de043` | `DR` |
> | **Reply ID**| $moId, $replyId| `a175e797-2b54-468b-9850-41a3eab32f74` | `MO` `MO MMS` |
> | **Account ID**  | $accountId| `DeveloperPortal7000` | `DR` `MO` `MO MMS` |
> | **Message Timestamp**  | $submittedTimestamp| `2016-12-07T08:43:00.850Z` | `DR` `MO` `MO MMS` |
> | **Provider Timestamp**  | $receivedTimestamp| `2016-12-07T08:44:00.850Z` | `DR` `MO` `MO MMS` |
> | **Message Status** | $status| `enroute` | `DR` |
> | **Status Code**  | $statusCode| `200` | `DR` |
> | **External Metadata** | $metadata.get('key')| `name` | `DR` `MO` `MO MMS` |
> | **Source Address**| $sourceAddress| `+61491570156` | `DR` `MO` `MO MMS` |
> | **Destination Address**| $destinationAddress| `+61491593156` | `MO` `MO MMS` |
> | **Message Content**| $mtContent, $messageContent| `Hi Derp` | `DR` `MO` `MO MMS` |
> | **Reply Content**| $moContent, $replyContent| `Hello Derpina` | `MO` `MO MMS` |
> | **Retry Count**| $retryCount| `1` | `DR` `MO` `MO MMS` |
> *Note: A 400 response will be returned if the `url` is invalid, the `events`, `encoding` or `method` is null or the `headers` has a Content-Type  attribute.*


```php
function createWebhook($body)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| body |  ``` Required ```  | TODO: Add a parameter description |



#### Example Usage

```php
$body = new CreateWebhookRequest();

$result = $webhooks->createWebhook($body);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 400 | Unexpected error in API call. See HTTP response body for details. |
| 409 | Unexpected error in API call. See HTTP response body for details. |



### <a name="retrieve_webhook"></a>![Method: ](https://apidocs.io/img/method.png ".WebhooksController.retrieveWebhook") retrieveWebhook

> Retrieve all the webhooks created for the connected account.
> A successful request to the retrieve webhook endpoint will return a response body as follows:
> ```
> {
>     "page": 0,
>     "pageSize": 100,
>     "pageData": [
>         {
>             "url": "https://webhook.com",
>             "method": "POST",
>             "id": "8805c9d8-bef7-41c7-906a-69ede93aa024",
>             "encoding": "JSON",
>             "events": [
>                 "RECEIVED_SMS"
>             ],
>             "headers": {},
>             "template": "{\"id\":\"$mtId\", \"status\":\"$statusCode\"}"
>         }
>     ]
> }
> ```
> *Note: Response 400 is returned when the `page` query parameter is not valid or the `pageSize` query parameter is not valid.*


```php
function retrieveWebhook(
        $page = null,
        $pageSize = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| page |  ``` Optional ```  | TODO: Add a parameter description |
| pageSize |  ``` Optional ```  | TODO: Add a parameter description |



#### Example Usage

```php
$page = 79;
$pageSize = 79;

$result = $webhooks->retrieveWebhook($page, $pageSize);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 400 | Unexpected error in API call. See HTTP response body for details. |



### <a name="delete_webhook"></a>![Method: ](https://apidocs.io/img/method.png ".WebhooksController.deleteWebhook") deleteWebhook

> Delete a webhook that was previously created for the connected account.
> A webhook can be cancelled by appending the UUID of the webhook to the endpoint and submitting a DELETE request to the /webhooks/messages endpoint.
> *Note: Only pre-created webhooks can be deleted. If an invalid or non existent webhook ID parameter is specified in the request, then a HTTP 404 Not Found response will be returned.*


```php
function deleteWebhook($webhookId)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| webhookId |  ``` Required ```  | TODO: Add a parameter description |



#### Example Usage

```php
$webhookId = a7f11bb0-f299-4861-a5ca-9b29d04bc5ad;

$webhooks->deleteWebhook($webhookId);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 404 | TODO: Add an error description |



### <a name="update_webhook"></a>![Method: ](https://apidocs.io/img/method.png ".WebhooksController.updateWebhook") updateWebhook

> Update a webhook. You can update individual attributes or all of them by submitting a PATCH request to the /webhooks/messages endpoint (the same endpoint used above to delete a webhook)
> A successful request to the retrieve webhook endpoint will return a response body as follows:
> ```
> {
>     "url": "https://webhook.com",
>     "method": "POST",
>     "id": "04442623-0961-464e-9cbc-ec50804e0413",
>     "encoding": "JSON",
>     "events": [
>         "RECEIVED_SMS"
>     ],
>     "headers": {},
>     "template": "{\"id\":\"$mtId\", \"status\":\"$statusCode\"}"
> }
> ```
> *Note: Only pre-created webhooks can be deleted. If an invalid or non existent webhook ID parameter is specified in the request, then a HTTP 404 Not Found response will be returned.*


```php
function updateWebhook(
        $webhookId,
        $body)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| webhookId |  ``` Required ```  | TODO: Add a parameter description |
| body |  ``` Required ```  | TODO: Add a parameter description |



#### Example Usage

```php
$webhookId = a7f11bb0-f299-4861-a5ca-9b29d04bc5ad;
$bodyValue = "    {        \"url\": \"https://myurl.com\",        \"method\": \"POST\",        \"encoding\": \"FORM_ENCODED\",        \"events\": [            \"ENROUTE_DR\"        ],        \"template\": \"{\\\"id\\\":\\\"$mtId\\\", \\\"status\\\":\\\"$statusCode\\\"}\"    }";
$body = APIHelper::deserialize($bodyValue);

$result = $webhooks->updateWebhook($webhookId, $body);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 400 | Unexpected error in API call. See HTTP response body for details. |
| 404 | TODO: Add an error description |



[Back to List of Controllers](#list_of_controllers)



