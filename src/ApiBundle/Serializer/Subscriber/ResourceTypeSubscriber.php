<?php

namespace ApiBundle\Serializer\Subscriber;

use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\ObjectEvent;
use JMS\Serializer\GenericSerializationVisitor;

class ResourceTypeSubscriber implements EventSubscriberInterface
{
    /**
     * @var array
     */
    private $registeredTypes;

    /**
     * @param array $registeredTypes
     */
    function __construct(array $registeredTypes = [])
    {
        $this->registeredTypes = $registeredTypes;
    }

    public static function getSubscribedEvents()
    {
        return [
            [
                'event' => Events::POST_SERIALIZE,
                'method' => 'onPostSerialize'
            ]
        ];
    }

    public function onPostSerialize(ObjectEvent $event)
    {
        $registeredTypes = $this->registeredTypes;
        $type = $event->getType()['name'];

        if (array_key_exists($type, $registeredTypes)) {
            /** @var GenericSerializationVisitor $visitor */
            $visitor = $event->getVisitor();
            $visitor->addData('type', $registeredTypes[$type]['type']);
        }
    }
}
