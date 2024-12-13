<?php

namespace PHLAK\Twine\Tests\Config;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class HexTest extends TestCase
{
    #[Test]
    public function it_extends_the_config_class(): void
    {
        $this->assertInstanceof(Twine\Config\Config::class, new Twine\Config\Hex);
    }

    #[Test]
    public function it_has_config_options(): void
    {
        $this->assertEquals('encode', Twine\Config\Hex::ENCODE);
        $this->assertEquals('decode', Twine\Config\Hex::DECODE);
    }
}
