<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/13
 * Time: 14:41
 */

require_once __DIR__ . '/../vendor/autoload.php';


trait Sellable
{
    protected $price = 0;

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice(int $price)
    {
        $this->price = $price;
    }
}

class Pruduct
{
    protected $brand;

    //...

    public function __construct($brand)
    {
        $this->brand = $brand;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    //...
}

class TV extends Pruduct
{
    use Sellable;

    //...

    public function play()
    {
        echo "一台 {$this->brand} 电视在播放中...";
    }

    public function test(float ...$n)
    {
        print_r($n);
    }

    public function foo(float $a): array
    {
        return array($a);
    }

    public function always_false()
    {
        return false;
    }


    //...
}

$test = new TV('tttttt');
$test->setPrice(10);
echo $test->getPrice();
echo $test->play();
var_dump($test->foo(10.01));

if (empty($test->always_false())) {
    echo 'This will be printed.';
}
var_dump(boolval($test->always_false()));
echo 'test'[3];


$records = array(
    array('id' => 2135,'name' => 'John'),
    array('id' => 3245,'name' => 'Smith'),
    array('id' => 5342,'name' => 'Peter')
);

//从结果集中取出 name 列
$names = array_column($records, 'name');
print_r($names);

//从结果集中总取出 name 列，用相应的 id 作为键值
$names = array_column($records, 'name', 'id');
print_r($names);
