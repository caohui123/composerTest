<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/21
 * Time: 15:58
 */
require_once __DIR__ . '/../bootsrap.php';

use Symfony\Component\Yaml\Yaml;
$file = __DIR__.'/../config.yml';
try {
    $array = Yaml::parse(file_get_contents($file));
/*    $array = array(
        'foo' => 'bar',
        'bar' => array('foo' => 'bar', 'bar' => 'baz'),
    );
    $yaml = Yaml::dump($array);
    file_put_contents($file, $yaml);*/
    $object = new \stdClass();
    $object->foo = 'bar';
    $dump = Yaml::dump($array, 2,8,Yaml::DUMP_OBJECT);
    echo $dump->foo;

} catch (\Symfony\Component\Yaml\Exception\ParseException $e) {
    printf("Unable to parse the YAML string: %s", $e->getMessage());
}


