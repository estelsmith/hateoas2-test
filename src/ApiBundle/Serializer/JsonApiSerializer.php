<?php

namespace ApiBundle\Serializer;

use Hateoas\Model\Embedded;
use Hateoas\Model\Link;
use Hateoas\Serializer\JsonSerializerInterface;
use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\SerializationContext;

class JsonApiSerializer implements JsonSerializerInterface
{
    /**
     * @param Link[] $links
     * @param JsonSerializationVisitor $visitor
     * @param SerializationContext $context
     */
    public function serializeLinks(array $links, JsonSerializationVisitor $visitor, SerializationContext $context)
    {
        $serializedLinks = [];

        if (count($links) > 0) {
            foreach ($links as $link) {
                $serializedLinks[$link->getRel()] = $link->getHref();
            }
        }

        $visitor->addData('links', $serializedLinks);
    }

    /**
     * @param Embedded[] $embeddeds
     * @param JsonSerializationVisitor $visitor
     * @param SerializationContext $context
     */
    public function serializeEmbeddeds(
        array $embeddeds,
        JsonSerializationVisitor $visitor,
        SerializationContext $context
    ) {
        $serializedEmbeddeds = []; // TODO: do it...

        $visitor->addData('included', $serializedEmbeddeds);
    }
}
