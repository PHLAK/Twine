<?php

namespace PHLAK\Twine\Tests\Config;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class HexTest extends TestCase
{
    public function test_it_extends_the_config_class()
    {
        $this->assertInstanceof(Twine\Config\Config::class, new Twine\Config\Hex);
    }

    public function test_it_has_config_options()
    {
        $this->assertEquals('encode', Twine\Config\Hex::ENCODE);
        $this->assertEquals('decode', Twine\Config\Hex::DECODE);
    }
}
