<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/27
 * Time: 10:17
 */

namespace app\events;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class StoreSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            'onStoreOrder' => 'onStoreOrder',
        );
    }


    public function onStoreOrder(OrderEvent $event)
    {
        print_r($event->getOrder());
        // ...
    }
}