<?php

namespace PHLAK\Twine\Tests\Config;

use PHLAK\Twine;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class Base64Test extends TestCase
{
    public function test_it_extends_the_config_class()
    {
        $this->assertInstanceof(Twine\Config\Config::class, new Twine\Config\Base64);
    }

    public function test_it_has_config_options()
    {
        $this->assertEquals('base64_encode', Twine\Config\Base64::ENCODE);
        $this->assertEquals('base64_decode', Twine\Config\Base64::DECODE);
    }
}
