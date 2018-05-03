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

* [APIController](#api_controller)

## <a name="api_controller"></a>![Class: ](https://apidocs.io/img/class.png ".APIController") APIController

### Get singleton instance

The singleton instance of the ``` APIController ``` class can be accessed from the API Client.

```php
$client = $client->getClient();
```

### <a name="create"></a>![Method: ](https://apidocs.io/img/method.png ".APIController.create") create

> This will create a webhook for the specified `events`
> ### Parameters
> **list of supported parameters in `template` according to the message type :**
> you must escape the json for the template parameter. see example .
> | Data   | parameter name | DR| MO | MO MMS | Comment |
> |:--|--|--|--|--|--|
> | **service type**  | $type| ``OK`` |`OK`| `OK`| |
> | **Message ID**  | $mtId, $messageId| `OK` |`OK`| `OK`| |
> | **Delivery report ID** |$drId, $reportId | `OK` || | |
> | **Reply ID**| $moId, $replyId| |`OK`| `OK`||
> | **Account ID**  | $accountId| `OK` |`OK`| `OK`||
> | **Message Timestamp**  | $submittedTimestamp| `OK` |`OK`| `OK`||
> | **Provider Timestamp**  | $receivedTimestamp| `OK` |`OK`| `OK`||
> | **Message status** | $status| `OK` ||||
> | **Status code**  | $statusCode| `OK` ||||
> | **External metadata** | $metadata.get('key')| `OK` |`OK`| `OK`||
> | **Source address**| $sourceAddress| `OK` |`OK`| `OK`||
> | **Destination address**| $destinationAddress|  |`OK`| `OK`||
> | **Message content**| $mtContent, $messageContent| `OK` |`OK`| `OK`||
> | **Reply Content**| $moContent, $replyContent|  |`OK`| `OK`||
> | **Retry Count**| $retryCount| `OK` |`OK`| `OK`||
> **list of allowed  `events` :**
> you can combine all the events whatever the message type.(at least one Event set otherwise the webhook won't be created)
> + **events for SMS**
>     + `RECEIVED_SMS`
>     + `OPT_OUT_SMS`
> + **events for MMS**
>     + `RECEIVED_MMS`
> + **events for DR**
>     + `ENROUTE_DR`
>     + `EXPIRED_DR`
>     + `REJECTED_DR`
>     + `FAILED_DR`
>     + `DELIVERED_DR`
>     + `SUBMITTED_DR`
> a **Response 400 is returned when** :
>     <ul>
>      <li>the `url` is not valid </li>
>      <li>the `events` is null/empty </li>
>      <li>the `encoding` is null </li>
>      <li>the `method` is null </li>
>      <li>the `headers` has a `ContentType`  attribute </li>
>     </ul>


```php
function create(
        $contentType,
        $body)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| contentType |  ``` Required ```  | TODO: Add a parameter description |
| body |  ``` Required ```  | TODO: Add a parameter description |



#### Example Usage

```php
$contentType = 'Content-Type';
$body = new CreateRequest();

$result = $client->create($contentType, $body);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 400 | TODO: Add an error description |



### <a name="delete_delete_and_update_webhook"></a>![Method: ](https://apidocs.io/img/method.png ".APIController.deleteDeleteAndUpdateWebhook") deleteDeleteAndUpdateWebhook

> This will delete the webhook wuth the give id.
> a **Response 404 is returned when** :
>     <ul>
>      <li>there is no webhook  with this `webhookId` </li>
>     </ul>


```php
function deleteDeleteAndUpdateWebhook($webhookId)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| webhookId |  ``` Required ```  | TODO: Add a parameter description |



#### Example Usage

```php
$webhookId = a7f11bb0-f299-4861-a5ca-9b29d04bc5ad;

$client->deleteDeleteAndUpdateWebhook($webhookId);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 404 | TODO: Add an error description |



### <a name="retrieve"></a>![Method: ](https://apidocs.io/img/method.png ".APIController.retrieve") retrieve

> This will retrieve all webhooks for the account we're connected with.
> a **Response 400 is returned when** :
>     <ul>
>      <li>the `page` query parameter is not valid </li>
>      <li>the `pageSize` query parameter is not valid </li>
>     </ul>


```php
function retrieve(
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
$page = '1';
$pageSize = '10';

$result = $client->retrieve($page, $pageSize);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 400 | TODO: Add an error description |



### <a name="update"></a>![Method: ](https://apidocs.io/img/method.png ".APIController.update") update

> This will update a webhook and returned the updated Webhook. 
> you can update all the attributes individually or together.
> PS : the new value will override the previous one.
> ### Parameters
> + same parameters rules as create webhook apply
>  a **Response 404 is returned when** :
>     <ul>
>      <li>there is no webhook with this `webhookId` </li>
>     </ul>   
>  a **Response 400 is returned when** :
>     <ul>
>       <li>all attributes are null </li>
>      <li>events array is empty </li>
>      <li>content-Type is set in the headers instead of using the `encoding` attribute  </li>
>     </ul>


```php
function update(
        $webhookId,
        $contentType,
        $body)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| webhookId |  ``` Required ```  | TODO: Add a parameter description |
| contentType |  ``` Required ```  | TODO: Add a parameter description |
| body |  ``` Required ```  | TODO: Add a parameter description |



#### Example Usage

```php
$webhookId = uniqid();
$contentType = 'Content-Type';
$body = new UpdateRequest();

$client->update($webhookId, $contentType, $body);

```

#### Errors

| Error Code | Error Description |
|------------|-------------------|
| 404 | TODO: Add an error description |



[Back to List of Controllers](#list_of_controllers)



