<?php

namespace PHLAK\Twine\Tests\Config;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class WrapTest extends TestCase
{
    #[Test]
    public function it_extends_the_config_class(): void
    {
        $this->assertInstanceof(Twine\Config\Config::class, new Twine\Config\Wrap);
    }

    #[Test]
    public function it_has_config_options(): void
    {
        $this->assertFalse(Twine\Config\Wrap::SOFT);
        $this->assertTrue(Twine\Config\Wrap::HARD);
    }
}
