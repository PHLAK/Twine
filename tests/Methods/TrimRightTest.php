<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class TrimRightTest extends TestCase
{
    #[Test]
    public function it_can_be_right_trimmed(): void
    {
        $string = new Twine\Str('john pinkerton');

        $rightTrimmed = $string->trimRight('jton');

        $this->assertInstanceOf(Twine\Str::class, $rightTrimmed);
        $this->assertEquals('john pinker', $rightTrimmed);
    }

    public function a_multibyte_string_can_be_right_trimmed(): void
    {
        $string = new Twine\Str('宮本 茂');

        $rightTrimmed = $string->trimRight('茂');

        $this->assertInstanceOf(Twine\Str::class, $rightTrimmed);
        $this->assertEquals('宮本 ', $rightTrimmed);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $rightTrimmed = $string->trimRight('jton');

        $this->assertEquals('ASCII', mb_detect_encoding($rightTrimmed));
    }
}
