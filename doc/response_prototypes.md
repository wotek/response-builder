# Response prototypes

Response prototypes are simple value objects with predefined response values. They serve too as an proxy to body and headers fields containers.

By default there is simple `DefaultPrototype` provided, it looks like:

```php
class DefaultPrototype implements PrototypeInterface
{
    protected $headers;
    protected $body;

    public function __construct()
    {
        $this->headers = new HeaderFields();
        $this->body = new BodyFields();
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    function getBody()
    {
        return $this->body;
    }
}
```
Default prototype is actually scaffolding, it does not define any fields.
*How you can extend it?* Here comes Headers and Body Fields.

Fields are predefined values. For example lets look at header's date field:
```php
class Date extends Simple
{
    public function __construct()
    {
        $this->name = 'Date';
		$this->value = (new \DateTime(null, new \DateTimeZone('UTC')))
        				->format('D, d M Y H:i:s').' GMT';
    }
}
```

.. this field introduces **Date** field to headers response with current date set.
Lets build response with that field included, step by step:

```php
// Steps from usage documentation

// Setup factory:
$factory = new Factory();
$json_factory = new JsonFactory();
$normalizer = new FieldsNormalizer();
$encoder = new JsonEncoder();
$serializer = new Serializer($normalizer, $encoder);
$json_factory->setSerializer($serializer);
$factory->register('json', $json_factory);

// Create response from json factory with default prototype
$response = $factory->create('json', new DefaultPrototype());
// Get headers container
$headers = $response->getPrototype()->getHeaders();
// Add Date field
$headers->add(new Date());
// Set example content
$response->setContent(array(
    'id' => 1,
    'title' => 'My awesome blog post',
    'timestamp' => time(),
));

// Send response
$response->send();
// or print it:
echo $response;
```
You shoulde get, headers like:
```
HTTP/1.0 200
Date : Tue, 28 Jan 2014 21:59:25 GMT
```
and response body:
```json
{"id":1,"title":"My awesome blog post","timestamp":1390946365}
```

Lets create `APIResponsePrototype` which contains pre-defined headers values for our API responses.
```php
class APIResponsePrototype
    extends \Wtk\Response\Prototype\DefaultPrototype
    implements \Wtk\Response\Prototype\PrototypeInterface
{
    public function __construct()
    {
        parent::__construct();
        $this->getHeaders()->add(
        	new \Wtk\Response\Header\Field\Date()
        );
        $this->getHeaders()->add(
            new \Wtk\Response\Header\Field\Simple('API-Version', '1.0')
        );
        $this->getHeaders()->add(
            new \Wtk\Response\Header\Field\Simple('Custom-Header', 'Value')
        );

    }
}
```
Build response using above prototype:
```php
// Assuming you've created factory like in example above
$response = $factory->create('json', new APIResponsePrototype());
$response->setContent(array(
    'id' => 1,
    'title' => 'My awesome blog post',
    'timestamp' => time(),
));
```

When you'll print out created response, you shoulde get headers like:
```
HTTP/1.0 200
Date: Tue, 28 Jan 2014 22:27:30 GMT
API-Version: 1.0
Custom-Header: Value
```
and response body:
```json
{"id":1,"title":"My awesome blog post","timestamp":1390946365}
```

Prototype can define up front body format. We are going to return API responses in JSON format and we would like to define in already. Lets skip headers definition and get to body - again lets create a prototype. (remember - all of this can be done step by step)

```php
class APIResponsePrototype
    extends \Wtk\Response\Prototype\DefaultPrototype
    implements \Wtk\Response\Prototype\PrototypeInterface
{
    public function __construct()
    {
        parent::__construct();

        /* we've skipped headers part */

        $this->getBody()->add(
            new \Wtk\Response\Body\Field\Code(200)
        );

        $this->getBody()->add(
            new \Wtk\Response\Body\Field\Errors(array())
        );

        $this->getBody()->add(
            new \Wtk\Response\Body\Field\Message(
                'Your request has completed succesfully'
            )
        );

        $this->getBody()->add(
            // Empty for now, will be filled in later
            new \Wtk\Response\Body\Field\Response()
        );
    }

    /**
     * Proxy method to concrete field object.
     * Feel free to add more.
     *
     * @param  mixed     $content
     */
    public function setContent($content)
    {
        $field = $this->getBody()->get('response');
        $field->setValue($content);
    }
}
```

Create response using this prototype:

```php
$response = $factory->create('json', new APIResponsePrototype());
// Set response content using proxy method from prototype
$response->getPrototype()->setContent(array(
    'id' => 1,
    'title' => 'My awesome blog post',
    'timestamp' => time(),
));
```

When you'll print out created response body should contain:
```json
{
    "code":200,
    "errors":[],
    "message":"Your request has completed succesfully",
    "response":{
        "id":1,
        "title":"My awesome blog post",
        "timestamp":1391011738
    }
}
```

## Documentation

* [Installation](installation.md)
* [Usage](usage.md)
* [Creating Factories](creating_factories.md)
* Response Prototypes
* [Response Serializers](creating_serializers.md)
* [Complete Example](complete_example.md)
* [Howto's](howto.md)
