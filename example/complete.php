<?php

require '../vendor/autoload.php';

use Wtk\Response\Factory;
use Wtk\Response\Factory\JsonFactory;
use Wtk\Response\Serializer\Serializer;
use Wtk\Response\Normalizer\FieldsNormalizer;
use Wtk\Response\Encoder\JsonEncoder;

/**
 * @var  Wtk\Response\FactoryInterface
 */
$factory = new Factory();

/**
 * @var Wtk\Response\Factory\FactoryInterface
 */
$json_factory = new JsonFactory();
/**
 * @var Wtk\Response\Normalizer\NormalizerInterface
 */
$normalizer = new FieldsNormalizer();
/**
 * Use json encoder
 *
 * @var Wtk\Response\Encoder\EncoderInterface
 */
$encoder = new JsonEncoder();
/**
 * @var Wtk\Response\Serializer\SerializerInterface
 */
$serializer = new Serializer($normalizer, $encoder);
/**
 * Tell factory to use serializer
 */
$json_factory->setSerializer($serializer);
/**
 * Register factory
 */
$factory->register('json', $json_factory);


/**
 * Response prototype we are going to use:
 */
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
            new \Wtk\Response\Header\Field\ContentType('application/json')
        );

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


/**
 * Create response
 */
$response = $factory->create('json', new APIResponsePrototype());
$response->getPrototype()->setContent(array(
    'id' => 1,
    'title' => 'My awesome blog post',
    'timestamp' => time(),
));

$response->send();

