<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class TrimTest extends TestCase
{
    #[Test]
    public function it_can_be_trimmed(): void
    {
        $string = new Twine\Str('   foo bar     ');

        $trimmed = $string->trim();

        $this->assertInstanceOf(Twine\Str::class, $trimmed);
        $this->assertEquals('foo bar', $trimmed);
    }

    #[Test]
    public function it_can_trim_specific_characters(): void
    {
        $string = new Twine\Str('john pinkerton');

        $trimmed = $string->trim('jton');

        $this->assertInstanceOf(Twine\Str::class, $trimmed);
        $this->assertEquals('hn pinker', $trimmed);
    }

    #[Test]
    public function it_can_trim_characters_from_the_left_only(): void
    {
        $string = new Twine\Str('john pinkerton');

        $leftTrimmed = $string->trim('jton', Twine\Config\Trim::LEFT);

        $this->assertInstanceOf(Twine\Str::class, $leftTrimmed);
        $this->assertEquals('hn pinkerton', $leftTrimmed);
    }

    #[Test]
    public function it_can_trim_characters_from_the_right_only(): void
    {
        $string = new Twine\Str('john pinkerton');

        $rightTrimmed = $string->trim('jton', Twine\Config\Trim::RIGHT);

        $this->assertInstanceOf(Twine\Str::class, $rightTrimmed);
        $this->assertEquals('john pinker', $rightTrimmed);
    }

    #[Test]
    public function it_is_multibyte_compatible(): void
    {
        $string = new Twine\Str('   宮本 茂     ');

        $trimmed = $string->trim();

        $this->assertInstanceOf(Twine\Str::class, $trimmed);
        $this->assertEquals('宮本 茂', $trimmed);
    }

    #[Test]
    public function it_can_trim_specific_characters_from_a_multibyte_string(): void
    {
        $string = new Twine\Str('宮本 茂');

        $trimmed = $string->trim('宮茂');

        $this->assertInstanceOf(Twine\Str::class, $trimmed);
        $this->assertEquals('本 ', $trimmed);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $trimmed = $string->trim('jton');

        $this->assertEquals('ASCII', mb_detect_encoding($trimmed));
    }
}
