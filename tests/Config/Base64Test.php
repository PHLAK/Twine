<?php

namespace PHLAK\Twine\Tests\Config;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class Base64Test extends TestCase
{
    #[Test]
    public function it_extends_the_config_class(): void
    {
        $this->assertInstanceof(Twine\Config\Config::class, new Twine\Config\Base64);
    }

    #[Test]
    public function it_has_config_options(): void
    {
        $this->assertEquals('base64_encode', Twine\Config\Base64::ENCODE);
        $this->assertEquals('base64_decode', Twine\Config\Base64::DECODE);
    }
}
