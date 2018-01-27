<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/21
 * Time: 15:58
 */
require_once __DIR__ . '/../bootsrap.php';
use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;
use Symfony\Component\Templating\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__.'/../views/%name%');

$templating = new PhpEngine(new TemplateNameParser(), $loader);

echo $templating->render('tpl.php', array('firstname' => 'Fabien'));