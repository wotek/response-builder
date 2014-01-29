<?php

require 'vendor/autoload.php';

use Wtk\Response\Factory;
use Wtk\Response\Factory\JsonFactory;

use Wtk\Response\Serializer\Serializer;

use Wtk\Response\Normalizer\FieldsNormalizer;
use Wtk\Response\Encoder\JsonEncoder;

use Wtk\Response\Prototype\DefaultPrototype;

use Wtk\Response\Header\Field\Simple as SimpleHeader;
use Wtk\Response\Header\Field\Date;

use Wtk\Response\Body\Field\Message;

/**
 * Abstract factory
 *
 * @var Factory
 */
$factory = new Factory();
/**
 * Create JSON Factory
 *
 * @var JsonFactory
 */
$json_factory = new JsonFactory();

$normalizer = new FieldsNormalizer();
$encoder = new JsonEncoder();

$serializer = new Serializer($normalizer, $encoder);

$json_factory->setSerializer($serializer);

/**
 * Register it within Abstract Factory
 */
$factory->register('json', $json_factory);
/**
 * Create JSON reponse
 *
 * @var ResponseInterface
 */


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


$response = $factory->create('json', new APIResponsePrototype());

// $headers = $response->getPrototype()->getHeaders();
// $headers->add(new Date());
// $headers->add(new SimpleHeader('API-Version', '1.0'));

// $body = $response->getPrototype()->getBody();
// $body->add(new Message('Resource found'));


// var_dump($response->getPrototype()->getHeaders()->toArray());
// var_dump($response->getPrototype()->getBody()->toArray());

// $response = $factory->create('json');
// $response->setStatusText('Lets say, we found entity you have asked for');
$response->getPrototype()->setContent(array(
    'id' => 1,
    'title' => 'My awesome blog post',
    'timestamp' => time(),
));

// var_dump($response);

echo '<pre>';
echo $response;
