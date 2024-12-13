<?php

namespace PHLAK\Twine\Tests\Config;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class UppercaseTest extends TestCase
{
    #[Test]
    public function it_extends_the_config_class(): void
    {
        $this->assertInstanceof(Twine\Config\Config::class, new Twine\Config\Uppercase);
    }

    #[Test]
    public function it_has_config_options(): void
    {
        $this->assertEquals('all', Twine\Config\Uppercase::ALL);
        $this->assertEquals('first', Twine\Config\Uppercase::FIRST);
        $this->assertEquals('words', Twine\Config\Uppercase::WORDS);
    }
}
