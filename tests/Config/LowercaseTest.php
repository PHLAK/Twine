<?php

namespace PHLAK\Twine\Tests\Config;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class LowercaseTest extends TestCase
{
    #[Test]
    public function it_extends_the_config_class(): void
    {
        $this->assertInstanceof(Twine\Config\Config::class, new Twine\Config\Lowercase);
    }

    #[Test]
    public function it_has_config_options(): void
    {
        $this->assertEquals('all', Twine\Config\Lowercase::ALL);
        $this->assertEquals('first', Twine\Config\Lowercase::FIRST);
        $this->assertEquals('words', Twine\Config\Lowercase::WORDS);
    }
}
