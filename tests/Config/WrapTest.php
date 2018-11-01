<?php

namespace PHLAK\Twine\Tests\Config;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class WrapTest extends TestCase
{
    public function test_it_extends_the_config_class()
    {
        $this->assertInstanceof(Twine\Config\Config::class, new Twine\Config\Wrap);
    }

    public function test_it_has_config_options()
    {
        $this->assertFalse(Twine\Config\Wrap::SOFT);
        $this->assertTrue(Twine\Config\Wrap::HARD);
    }
}
