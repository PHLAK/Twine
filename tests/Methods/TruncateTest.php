<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class TruncateTest extends TestCase
{
    #[Test]
    public function it_can_be_truncated(): void
    {
        $string = new Twine\Str('john pinkerton');

        $truncated = $string->truncate(12);

        $this->assertInstanceOf(Twine\Str::class, $truncated);
        $this->assertEquals('john pink...', $truncated);
    }

    #[Test]
    public function it_can_be_truncated_with_an_alternate_suffix(): void
    {
        $string = new Twine\Str('john pinkerton');

        $truncated = $string->truncate(10, '~');

        $this->assertInstanceOf(Twine\Str::class, $truncated);
        $this->assertEquals('john pink~', $truncated);
    }

    #[Test]
    public function it_removes_whitespace_when_truncated_to_a_word_boundary(): void
    {
        $string = new Twine\Str('john pinkerton');

        $truncated = $string->truncate(8);

        $this->assertInstanceOf(Twine\Str::class, $truncated);
        $this->assertEquals('john...', $truncated);
    }

    public function a_multiline_string_can_be_truncated(): void
    {
        $string = new Twine\Str('john pinkerton' . PHP_EOL . 'the great and powerful');

        $truncated = $string->truncate(24);

        $this->assertInstanceOf(Twine\Str::class, $truncated);
        $this->assertEquals('john pinkerton' . PHP_EOL . 'the gr...', $truncated);
    }

    public function a_multiline_string_is_truncated_to_one_line_when_truncated_to_a_newline(): void
    {
        $string = new Twine\Str('john pinkerton' . PHP_EOL . 'the great and powerful');

        $truncated = $string->truncate(18);

        $this->assertInstanceOf(Twine\Str::class, $truncated);
        $this->assertEquals('john pinkerton...', $truncated);
    }

    public function a_multibyte_string_can_be_truncated(): void
    {
        $string = new Twine\Str('宮本 茂');

        $truncated = $string->truncate(4, '...');

        $this->assertInstanceOf(Twine\Str::class, $truncated);
        $this->assertEquals('宮...', $truncated);
    }

    public function a_multibyte_string_can_be_truncated_to_a_word_boundary(): void
    {
        $string = new Twine\Str('宮本 茂');

        $truncated = $string->truncate(4, '~');

        $this->assertInstanceOf(Twine\Str::class, $truncated);
        $this->assertEquals('宮本~', $truncated);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $truncated = $string->truncate(12);

        $this->assertEquals('ASCII', mb_detect_encoding($truncated));
    }
}
