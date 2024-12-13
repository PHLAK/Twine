<?php

namespace PHLAK\Twine\Tests\Config;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class TrimTest extends TestCase
{
    #[Test]
    public function it_extends_the_config_class(): void
    {
        $this->assertInstanceof(Twine\Config\Config::class, new Twine\Config\Trim);
    }

    #[Test]
    public function it_has_config_options(): void
    {
        $this->assertEquals('trim', Twine\Config\Trim::BOTH);
        $this->assertEquals('ltrim', Twine\Config\Trim::LEFT);
        $this->assertEquals('rtrim', Twine\Config\Trim::RIGHT);
    }
}
