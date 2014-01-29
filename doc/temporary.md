
<?php


/**
 * Hook into sf2 controllers using events:
 *
 * http://symfony.com/doc/current/components/http_kernel/introduction.html#component-http-kernel-event-table
 *
 * http://symfony.com/doc/current/components/http_kernel/introduction.html#component-http-kernel-kernel-response
 *
 */

$factory = new ResponseFactory();
/**
 * Setup:
 * Done by DI rather than manually:
 */
$serializer = new JMSSerializer();
$prototype = new PrototypeInstance();

$factory->addDefinition('json',
    new JsonResponseFactory($serializer, $prototype)
);

$response = $factory->create('json', $prototype?);

/**
 * What factory does is:
 *
 * [] Using default proto with response schema
 *
 * $response->setPrototype(new DefaultPrototype());
 *
 * [] Passing in serializer for __toString method
 *
 * $response->setSerializer(new Serializer());
 *
 * return $response;
 *
 */

/**
 * Old way:
 */
$response->setMessage('ojojoj');
$response->setCode(200);
// etc..
$response->setContent($entity);
$response->send();

/**
 * Using prototypes:
 * Ie: ResourceNotFoundResponse implements ResponsePrototypeInterface
 */

$error_proto = new ResourceNotFoundResponse();
$response->setPrototype($error_proto);
$response->send();

$resource_proto = new ResourceResponse($entity);
$response->setPrototype($resource_proto);
$response->send();

/**
 * ResponsePrototypeInterface should know what headers and body are going to
 * look like
 */

interface ResponsePrototypeInterface {
    function getHeaders(); -> HeadersBag
    function getBody(); -> BodyBag
}




/**
 * To be considered:
 */

$prototype = new Prototype();
$prototype->getHeaders()->add(new APIV1Signature());
$prototype->getHeaders()->add(new APIRemainingRequestSignature());
$prototype->getHeaders()->add(new BareerTokenSIgnature());
$prototype->getHeaders()->add(new ESISignature());

$prototype->getBody()->add(new CodeContainer());
$prototype->getBody()->add(new MessageContainer());
$prototype->getBody()->add(new DataContainer());

// This will result in schema:
Headers:
    Api-Signature: v1
    Api-Remaining-Requests: 1000
    Baarer-Token: supersecrethash
    ESI-Inline/1.0

Body:
{
    code: int,
    message: text,
    data: mixed
}
