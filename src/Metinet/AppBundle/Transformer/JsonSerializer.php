<?php
namespace Metinet\AppBundle\Transformer;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;

class JsonSerializer implements SerializerInterface
{
    public function serialize($mixed)
    {
        $normalizer = new GetSetMethodNormalizer();
        $encoder = new JsonEncoder();

        $serializer = new Serializer(array($normalizer), array($encoder));
        $jsonified = $serializer->serialize($mixed, 'json');

        return $jsonified;
    }
}