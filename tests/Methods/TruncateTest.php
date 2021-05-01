<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class TruncateTest extends TestCase
{
    public function test_it_can_be_truncated()
    {
        $string = new Twine\Str('john pinkerton');

        $truncated = $string->truncate(12);

        $this->assertInstanceOf(Twine\Str::class, $truncated);
        $this->assertEquals('john pink...', $truncated);
    }

    public function test_it_can_be_truncated_with_an_alternate_suffix()
    {
        $string = new Twine\Str('john pinkerton');

        $truncated = $string->truncate(10, '~');

        $this->assertInstanceOf(Twine\Str::class, $truncated);
        $this->assertEquals('john pink~', $truncated);
    }

    public function test_it_removes_whitespace_when_truncated_to_a_word_boundary()
    {
        $string = new Twine\Str('john pinkerton');

        $truncated = $string->truncate(8);

        $this->assertInstanceOf(Twine\Str::class, $truncated);
        $this->assertEquals('john...', $truncated);
    }

    public function test_a_multiline_string_can_be_truncated()
    {
        $string = new Twine\Str('john pinkerton' . PHP_EOL . 'the great and powerful');

        $truncated = $string->truncate(24);

        $this->assertInstanceOf(Twine\Str::class, $truncated);
        $this->assertEquals('john pinkerton' . PHP_EOL . 'the gr...', $truncated);
    }

    public function test_a_multiline_string_is_truncated_to_one_line_when_truncated_to_a_newline()
    {
        $string = new Twine\Str('john pinkerton' . PHP_EOL . 'the great and powerful');

        $truncated = $string->truncate(18);

        $this->assertInstanceOf(Twine\Str::class, $truncated);
        $this->assertEquals('john pinkerton...', $truncated);
    }

    public function test_a_multibyte_string_can_be_truncated()
    {
        $string = new Twine\Str('宮本 茂');

        $truncated = $string->truncate(4, '...');

        $this->assertInstanceOf(Twine\Str::class, $truncated);
        $this->assertEquals('宮...', $truncated);
    }

    public function test_a_multibyte_string_can_be_truncated_to_a_word_boundry()
    {
        $string = new Twine\Str('宮本 茂');

        $truncated = $string->truncate(4, '~');

        $this->assertInstanceOf(Twine\Str::class, $truncated);
        $this->assertEquals('宮本~', $truncated);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $truncated = $string->truncate(12);

        $this->assertEquals('ASCII', mb_detect_encoding($truncated));
    }
}
