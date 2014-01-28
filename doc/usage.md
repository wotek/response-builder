# Usage

Create an abstract factory:

```
/**
 * @var  Wtk\Response\FactoryInterface
 */
$factory = new Factory();
```

Next step is to register `JsonFactory` within abstract factory. Concrete Factories have to implement `Wtk\Response\Factory\FactoryInterface`.

`JsonFactory`  is an `SerializerAwareFactory` which has serializer instance attached to it. This serializer is used to serialize response content in this case return an json string.

```
/**
 * @var Wtk\Response\Factory\FactoryInterface
 */
$json_factory = new JsonFactory();
```
Next step is to set serializer for this factory.

You can create your own - it just have to implement `\Wtk\Response\Serializer\SerializerInterface` or make for example JMS/Serializer [link me] work with it or any other out there for that matter.

```
/**
 * @var Wtk\Response\Serializer\SerializerInterface
 */
$serializer = new  JsonSerializer();

$json_factory->setSerializer($serializer);
```

And finally register it:

```
$factory->register('json', $json_factory);
```

Most of the code above usally is done by Dependency Injection container. 
For integration examples with few Dependency Injection containers out there look in `/example` folder.

Lets create response object:
```
/**
 * @var ResponseInterface
 */
$response = $factory->create('json');

```

