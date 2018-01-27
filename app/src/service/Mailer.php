<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/13
 * Time: 15:47
 */

namespace app\src\service;

class Mailer
{
    private $transport;

    public function __construct()
    {
        $this->transport = 'sendmail';
        echo 'OK';
    }
}