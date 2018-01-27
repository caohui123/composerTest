<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/13
 * Time: 15:00
 */

use Symfony\Component\DependencyInjection\ContainerBuilder;
use app\src\service\Test;
$test = new Test();
$container = new ContainerBuilder();
$container->register('test','Test');