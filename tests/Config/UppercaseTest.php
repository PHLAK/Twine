<?php

namespace PHLAK\Twine\Tests\Config;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class UppercaseTest extends TestCase
{
    public function test_it_extends_the_config_class()
    {
        $this->assertInstanceof(Twine\Config\Config::class, new Twine\Config\Uppercase);
    }

    public function test_it_has_config_options()
    {
        $this->assertEquals('all', Twine\Config\Uppercase::ALL);
        $this->assertEquals('first', Twine\Config\Uppercase::FIRST);
        $this->assertEquals('words', Twine\Config\Uppercase::WORDS);
    }
}
