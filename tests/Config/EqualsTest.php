<?php

namespace PHLAK\Twine\Tests\Config;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class EqualsTest extends TestCase
{
    #[Test]
    public function it_extends_the_config_class(): void
    {
        $this->assertInstanceof(Twine\Config\Config::class, new Twine\Config\Equals);
    }

    #[Test]
    public function it_has_config_options(): void
    {
        $this->assertEquals('strcmp', Twine\Config\Equals::CASE_SENSITIVE);
        $this->assertEquals('strcasecmp', Twine\Config\Equals::CASE_INSENSITIVE);
    }
}
