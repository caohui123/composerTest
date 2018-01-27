<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/21
 * Time: 15:58
 */
require_once __DIR__ . '/../bootsrap.php';

use Symfony\Component\Stopwatch\Stopwatch;

$stopwatch = new Stopwatch();
// Start event named 'eventName' / 启动一个命名为'eventName'的事件
$stopwatch->start('eventName');
sleep(1);
$stopwatch->lap('eventName');
sleep(2);
$stopwatch->lap('eventName');
sleep(2);
$stopwatch->lap('eventName');
sleep(1);
// ... some code goes here / ...此处执行一些代码
$event = $stopwatch->stop('eventName');

print_r($event->getPeriods());exit;