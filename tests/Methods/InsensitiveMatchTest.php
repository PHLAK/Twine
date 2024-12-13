<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class InsensitiveMatchTest extends TestCase
{
    #[Test]
    public function it_can_be_insensitively_matched(): void
    {
        $string = new Twine\Str('john pinkerton');

        $matches = $string->insensitiveMatch('JoHN PiNKeRToN');
        $differs = $string->insensitiveMatch('BoB BeLCHeR');

        $this->assertTrue($matches);
        $this->assertFalse($differs);
    }

    public function a_multibyte_string_can_be_insensitively_matched(): void
    {
        $string = new Twine\Str('宮本 茂');

        $matches = $string->insensitiveMatch('宮本 茂');
        $differs = $string->insensitiveMatch('任天堂');

        $this->assertTrue($matches);
        $this->assertFalse($differs);
    }
}
