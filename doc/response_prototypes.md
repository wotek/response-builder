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
$serializer = new  JsonSerializer();
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

