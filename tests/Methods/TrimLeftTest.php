<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class TrimLeftTest extends TestCase
{
    #[Test]
    public function it_can_be_left_trimmed(): void
    {
        $string = new Twine\Str('john pinkerton');

        $leftTrimmed = $string->trimLeft('jton');

        $this->assertInstanceOf(Twine\Str::class, $leftTrimmed);
        $this->assertEquals('hn pinkerton', $leftTrimmed);
    }

    public function a_multibyte_string_can_be_left_trimmed(): void
    {
        $string = new Twine\Str('宮本 茂');

        $leftTrimmed = $string->trimLeft('宮');

        $this->assertInstanceOf(Twine\Str::class, $leftTrimmed);
        $this->assertEquals('本 茂', $leftTrimmed);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $leftTrimmed = $string->trimLeft('jton');

        $this->assertEquals('ASCII', mb_detect_encoding($leftTrimmed));
    }
}
