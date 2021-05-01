<?php

namespace PHLAK\Twine\Tests\Config;

use PHLAK\Twine;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class PadTest extends TestCase
{
    public function test_it_extends_the_config_class()
    {
        $this->assertInstanceof(Twine\Config\Config::class, new Twine\Config\Pad);
    }

    public function test_it_has_config_options()
    {
        $this->assertEquals(STR_PAD_RIGHT, Twine\Config\Pad::RIGHT);
        $this->assertEquals(STR_PAD_LEFT, Twine\Config\Pad::LEFT);
        $this->assertEquals(STR_PAD_BOTH, Twine\Config\Pad::BOTH);
    }
}
