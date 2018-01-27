<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/27
 * Time: 9:49
 */

namespace app\events;


use app\entity\Order;
use Symfony\Component\EventDispatcher\Event;

class OrderEvent extends Event
{

    const NAME = 'order.placed';
    private $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param mixed $order
     */
    public function setOrder($order): void
    {
        $this->order = $order;
    }

}