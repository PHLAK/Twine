<?php

namespace PHLAK\Twine\Tests\Config;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class LowercaseTest extends TestCase
{
    public function test_it_extends_the_config_class()
    {
        $this->assertInstanceof(Twine\Config\Config::class, new Twine\Config\Lowercase);
    }

    public function test_it_has_config_options()
    {
        $this->assertEquals('all', Twine\Config\Lowercase::ALL);
        $this->assertEquals('first', Twine\Config\Lowercase::FIRST);
        $this->assertEquals('words', Twine\Config\Lowercase::WORDS);
    }
}
