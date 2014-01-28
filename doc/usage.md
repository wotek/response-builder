# Usage

### Create factory and response step by step

Create an abstract factory:

```php
/**
 * @var  Wtk\Response\FactoryInterface
 */
$factory = new Factory();
```

Next step is to register `JsonFactory` within abstract factory. Concrete Factories have to implement `Wtk\Response\Factory\FactoryInterface`. See [creating response factory](creating_factories.md) for more on thatn topic.

`JsonFactory`  is an `SerializerAwareFactory` which has serializer instance attached to it. This serializer is used to serialize response content in this case return an json string.

```php
/**
 * @var Wtk\Response\Factory\FactoryInterface
 */
$json_factory = new JsonFactory();
```
Next step is to set serializer for this factory.

You can create your own - it just have to implement `\Wtk\Response\Serializer\SerializerInterface` or make for example JMS/Serializer [**link me**] work with it or any other out there for that matter.

For more information about creating your own serializers go to  [response serializers](creating_serializers.md).

```php
/**
 * @var Wtk\Response\Serializer\SerializerInterface
 */
$serializer = new  JsonSerializer();

$json_factory->setSerializer($serializer);
```

And finally register it:

```php
$factory->register('json', $json_factory);
```

Most of the code above usally is done by Dependency Injection container.
For integration examples with few Dependency Injection containers out there look in `/example` folder.

Lets create response object:
```php
/**
 * @var ResponseInterface
 */
$response = $factory->create('json');

// Set status code, by default it is 200
$response->setStatus(200);

// Set status text
$response->setStatusText('Lets say, we found entity you have asked for');

// Set content
$response->setContent(array(
	'id' => 1,
    'title' => 'My awesome blog post',
    'timestamp' => time(),
));

// ... and finally send response back to browser
$response->send();

// or if you want to see how it would look just print it
echo $response
```

You should get something like:

Response headers:

```
HTTP/1.0 200 Lets say, we found entity you have asked for
```

Response body:

```json
{"id":1,"title":"My awesome blog post","timestamp":1390935625}
```

This is really basic API, next step is using prototypes to save us some time when creating responses.  Go to [Response Prototypes](response_prototypes.md) to learn more.

## Documentation

* [Installation](installation.md)
* Usage
* [Creating Factories](creating_factories.md)
* [Response Prototypes](response_prototypes.md)
* [Response Serialiers](creating_serializers.md)
* [Complete Example](complete_example.md)
* [Howto's](howto.md)
