<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/27
 * Time: 9:49
 */

namespace app\listener;


use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\GenericEvent;

class AcmeListener
{
    public function onFooAction(GenericEvent $event)
    {
        print_r($event->getSubject());
        // ... do something 做一些事
    }
}