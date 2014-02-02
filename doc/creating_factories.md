Factories
========

Response factories have to implement `Wtk\Response\Factory\FactoryInterface` which requires:

```php
function create(PrototypeInterface $prototype = null);
```

Example factory, which uses serializer to parse response content to specific format:

```php
namespace My\Own\Factory;

use Wtk\Response;
use Wtk\Response\Prototype\PrototypeInterface;
use Wtk\Response\Factory\SerializerAwareFactory;

class MyFactory extends SerializerAwareFactory implements FactoryInterface
{
	public function create(PrototypeInterface $prototype = null)
    {
    	$response = new Response();
        
        if (null !== $prototype) {
            $response->setPrototype($prototype);
        }
        
        $response->setSerializer($this->getSerializer());
        
        /**
         * Here you can alter response any way you want...
         */
        
        return $response;
    }
}
```


## Documentation

* [Installation](installation.md)
* [Usage](usage.md)
* Creating Factories
* [Response Prototypes](response_prototypes.md)
* [Response Serialiers](creating_serializers.md)
* [Complete Example](complete_example.md)
* [Howto's](howto.md)

