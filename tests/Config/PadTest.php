<?php

namespace PHLAK\Twine\Tests\Config;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class PadTest extends TestCase
{
    #[Test]
    public function it_extends_the_config_class(): void
    {
        $this->assertInstanceof(Twine\Config\Config::class, new Twine\Config\Pad);
    }

    #[Test]
    public function it_has_config_options(): void
    {
        $this->assertEquals(STR_PAD_RIGHT, Twine\Config\Pad::RIGHT);
        $this->assertEquals(STR_PAD_LEFT, Twine\Config\Pad::LEFT);
        $this->assertEquals(STR_PAD_BOTH, Twine\Config\Pad::BOTH);
    }
}
