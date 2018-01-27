<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/27
 * Time: 9:36
 */
require_once __DIR__ . '/../vendor/autoload.php';


/*
$str = "aaaa 花花草草 劳斯莱斯";
$i = strpos($str,' ')+1;
$str = substr_replace(' ','   ',$str,0,$i);
echo $i;
echo $str;
exit;*/

//$files = file_get_contents("../222.dis");

//foreach($files as $line){
    //print_r($files);
//}
$myfile = fopen("../222.dis", "r") or die("Unable to open file!");
$wirtefile = fopen("../test.dis", "w") or die("Unable to open file!");
while(!feof($myfile)) {
    $line = fgets($myfile);
    $i = strpos($line,' ')+1;
    $str = substr_replace($line,'   ',$i);
    fwrite($wirtefile,$str);
}
fclose($myfile);
fclose($wirtefile);