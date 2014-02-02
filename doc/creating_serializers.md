Serializers
========

Serializers are responsible for turning objects into specific format (XML, JSON, ...) for this to happen it uses **Normalizer** and **Encoder**.

At the moment library comes with `FieldsNormalizer` which normalizes body fields collection to an array which then is turned into json string by `JsonEncoder`.

> There is popular [JMS Serializer](https://github.com/schmittjoh/serializer) you can use for serializing data responses. It is really complex solution - worth checking it out. For exmaple intergration with response-builder check `example` folder.

## Normalizers

Lets build simple objet normalizer. Nothing fancy - we are going to enforce on objects through interface toArray method:

```php
interface Arrayable
{
    function toArray();
}
```

```php
class Foo implements Arrayable
{
    public function toArray()
    {
        return array('this' => 1, 'is' => 'my', 'content' => array());
    }
}
```
Then normalizer implementation can look like:
```php
class ArrayableNormalizer implements \Wtk\Response\Normalizer\NormalizerInterface
{
    public function normalizer($input)
    {
        if(!$input instanceof Arrayable) {
            throw new \RuntimeException(
                "As input normalizer requires an Arrayable instance"
            );
        }

        return $input->toArray();
    }
}
```
Lets test it out:

```php
$object = new Foo();
$normalizer = new ArrayableNormalizer();

var_export($normalizer->normalize($object));
// Returns as expected an array :)
array ( 'this' => 1, 'is' => 'my', 'content' => array ( ), )
```
 It ain't rocket science but it shows what normalizer is responsible for.

## Encoders

We are going to create YAML encoder using great Symfony's [YAML Component](http://symfony.com/doc/current/components/yaml/introduction.html).

I'm assuming you have it already installed.

Encoders have to follow `EncoderInterface`:
```php
class YamlEncoder implements \Wtk\Response\Encoder\EncoderInterface
{
    public function __construct($yaml_dumper)
    {
        $this->yaml_dumper = $yaml_dumper;
    }

    public function encode($input)
    {
        return $this->yaml_dumper->dump($input, 2);
    }
}
```
Lets test it out:
```php
use Symfony\Component\Yaml\Dumper;

$encoder = new YamlEncoder(new Dumper());

$array = array(
    'foo' => 'bar',
    'bar' => array('foo' => 'bar', 'bar' => 'baz'),
);

$encoder->encode($array);
```
As a result we get:
```yaml
foo: bar
bar:
    foo: bar
    bar: baz
```

## Complete example

Lets put it all together.

Assuming we have implemented all above. We should be able put together complete normalizer.
We are going to serialize *Foo* object that we've created before.

```php
$normalizer = new ArrayableNormalizer();
$encoder = new YamlEncoder(new Dumper());
$serializer = new Serializer($normalizer, $encoder);

// Serialize objet
$object = new Foo();
$result = $serializer->serialize($object);
```
as an result we should get:
```yaml
this: 1
is: my
content: {  }
```

## Documentation

* [Installation](doc/installation.md)
* [Usage](doc/usage.md)
* [Creating Factories](doc/creating_factories.md)
* [Response Prototypes](doc/response_prototypes.md)
* Response Serializers
* [Complete Example](doc/complete_example.md)
* [Howto's](doc/howto.md)
