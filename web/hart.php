<?php
require_once __DIR__ . '/../vendor/autoload.php';
use Workerman\Worker;
use Workerman\Lib\Timer;

// 心跳间隔25秒
define('HEARTBEAT_TIME', 60);

$worker = new Worker('websocket://0.0.0.0:2356');
$worker->onConnect = function($connection)
{
    echo "New connection\n";
};
$worker->onMessage = function($connection, $msg) {
    // 给connection临时设置一个lastMessageTime属性，用来记录上次收到消息的时间
    $connection->lastMessageTime = time();
    // 其它业务逻辑...
    $connection->send('hello ' .time().$msg);
};


// Emitted when connection closed
$worker->onClose = function($connection)
{
    echo "Connection closed\n";
};

// 进程启动后设置一个每秒运行一次的定时器
$worker->onWorkerStart = function($worker) {
    Timer::add(1, function()use($worker){
        $time_now = time();
        foreach($worker->connections as $connection) {
            // 有可能该connection还没收到过消息，则lastMessageTime设置为当前时间
            if (empty($connection->lastMessageTime)) {
                $connection->lastMessageTime = $time_now;
                continue;
            }
            // 上次通讯时间间隔大于心跳间隔，则认为客户端已经下线，关闭连接
            if ($time_now - $connection->lastMessageTime > HEARTBEAT_TIME) {
                $connection->close();
            }
        }
    });
};

Worker::runAll();