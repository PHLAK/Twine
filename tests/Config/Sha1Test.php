<?php

namespace PHLAK\Twine\Tests\Config;

use PHLAK\Twine;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class Sha1Test extends TestCase
{
    public function test_it_extends_the_config_class()
    {
        $this->assertInstanceof(Twine\Config\Config::class, new Twine\Config\Sha1);
    }

    public function test_it_has_config_options()
    {
        $this->assertFalse(Twine\Config\Sha1::DEFAULT);
        $this->assertTrue(Twine\Config\Sha1::RAW);
    }
}
