<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/21
 * Time: 15:58
 */
require_once __DIR__ . '/../bootsrap.php';
use LanguageDetection\Language;

$ld = new Language();
//$ld->setMaxNgrams(9000);
$s = 'Bank Rakyat China';
//$res = $ld->detect('Mag het een onsje meer zijn?')->bestResults()->close();
$res = $ld->detect($s)->limit(0,10);//->bestResults()->limit(0,4)->close();
if(isset($res['en'])|| isset($res['eo'])){
    echo 'en';
}else{
    print_r($res->bestResults());
}
$res->close();
exit;
