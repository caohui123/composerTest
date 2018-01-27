<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/21
 * Time: 15:58
 */
require_once __DIR__ . '/../bootsrap.php';

use app\events\OrderEvent;
use app\events\StoreSubscriber;
use app\listener\AcmeListener;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\Event;
$dispatcher = new EventDispatcher();

$listener = new AcmeListener();
$dispatcher->addListener('acme.action', array($listener, 'onFooAction'));
$dispatcher->addListener(OrderEvent::NAME, function (OrderEvent $event) {
    print_r($event->getOrder());
    // will be executed when the foo.action event is dispatched
    // （此处的代码）将在foo.action事件被派遣之后执行
});
$order = new \app\entity\Order();
$order->setPrice(10);
$order->setName('apple');

$event = new OrderEvent($order);
$dispatcher->dispatch(OrderEvent::NAME, $event);

$order->setPrice(20);
$order->setName('mac');
$subscriber = new StoreSubscriber();
$dispatcher->addSubscriber($subscriber);
$dispatcher->dispatch('onStoreOrder',$event);

$order->setPrice(30);
$order->setName('iphone');
$event = new \Symfony\Component\EventDispatcher\GenericEvent($order);
$dispatcher->dispatch('acme.action',$event);

echo 'dddddd';