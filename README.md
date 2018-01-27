# 金立PHP开发规范
---
PHPCS

安装

有以下方式安装 PHPCS:

使用 composer:
---
```html
composer global require "squizlabs/php_codesniffer=*"
```
注意，你可能需要将 ~/.composer/vendor/bin/ 添加到 PATH 环境变量中，否则会报命令找不到。
使用

查看帮助：
---
```html
phpcs --help
```

进入要检查的目录直接运行
```php
phpcs --standard=gionee-checks.xml
```

php代码实例：
---
```php
<?php
/**
 * 文件注释
 */

namespace App;

/**
 * Class Test
 * @package App
 */
class Test
{
    const TEST_S = 'tdd';
    protected $a;
    private $t;
    private $c;

    /**
     * Test constructor.
     */
    private function __construct()
    {
        return 'dddd';
    }

    /**
     * sdfsdfd
     * @param string $a sdfsdf
     * @param int $b sdfsdf
     * @param int $c sdfsdf
     * @return string
     */
    public function testdddd($a, $b = 0, $c = 0)
    {
        //$a = $b . $a;
        /** $a */
        $d = "ddddddddddddd";
        return $a . $b . $c . "ssssss";
    }

    /**
     * @return string
     */
    protected function testss()
    {
        $a = 1;
        if (1 == $a) {
            // if body
            $a = 2;
        } elseif (3 == $a) {
            // elseif body
            $a = 2;
        } else {
            // else body;
            $a = 3;
        }

        /** $a */
        if (strpos('foos', 'foo') === false) {
            $a = 2;
        }
        return $a;
    }


    /**
     * @return boolean
     */
    private function testf()
    {
        return 0;
    }
}

```
