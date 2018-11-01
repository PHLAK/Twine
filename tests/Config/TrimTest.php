<?php

namespace PHLAK\Twine\Tests\Config;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class TrimTest extends TestCase
{
    public function test_it_extends_the_config_class()
    {
        $this->assertInstanceof(Twine\Config\Config::class, new Twine\Config\Trim);
    }

    public function test_it_has_config_options()
    {
        $this->assertEquals('trim', Twine\Config\Trim::BOTH);
        $this->assertEquals('ltrim', Twine\Config\Trim::LEFT);
        $this->assertEquals('rtrim', Twine\Config\Trim::RIGHT);
    }
}
