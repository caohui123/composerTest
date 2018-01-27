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
