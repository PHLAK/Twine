<?php

namespace PHLAK\Twine\Tests\Config;

use PHLAK\Twine;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class EqualsTest extends TestCase
{
    public function test_it_extends_the_config_class()
    {
        $this->assertInstanceof(Twine\Config\Config::class, new Twine\Config\Equals);
    }

    public function test_it_has_config_options()
    {
        $this->assertEquals('strcmp', Twine\Config\Equals::CASE_SENSITIVE);
        $this->assertEquals('strcasecmp', Twine\Config\Equals::CASE_INSENSITIVE);
    }
}
