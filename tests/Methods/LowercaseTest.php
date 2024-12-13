<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHLAK\Twine\Exceptions\ConfigException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class LowercaseTest extends TestCase
{
    #[Test]
    public function it_can_be_lowercased(): void
    {
        $string = new Twine\Str('JOHN PINKERTON');

        $lowercased = $string->lowercase();

        $this->assertInstanceOf(Twine\Str::class, $lowercased);
        $this->assertEquals('john pinkerton', $lowercased);
    }

    #[Test]
    public function it_can_lowercase_the_first_letter_only(): void
    {
        $string = new Twine\Str('JOHN PINKERTON');

        $lcFirst = $string->lowercase(Twine\Config\Lowercase::FIRST);

        $this->assertInstanceOf(Twine\Str::class, $lcFirst);
        $this->assertEquals('jOHN PINKERTON', $lcFirst);
    }

    #[Test]
    public function it_can_lowercase_the_first_letter_of_each_word(): void
    {
        $string = new Twine\Str("JOHN PINKERTON\nJOHN\tPINKERTON");

        $lcWords = $string->lowercase(Twine\Config\Lowercase::WORDS);

        $this->assertInstanceOf(Twine\Str::class, $lcWords);
        $this->assertEquals("jOHN pINKERTON\njOHN\tpINKERTON", $lcWords);
    }

    #[Test]
    public function it_throws_an_exception_when_lowercasing_with_an_invalid_config_option(): void
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectException(ConfigException::class);

        $string->lowercase('invalid');
    }

    #[Test]
    public function it_can_lowercase_a_multibyte_string(): void
    {
        $first = new Twine\Str('ДЖОН ПИНКЕРТОН');

        $lowercased = $first->lowercase();
        $lowercasedFirst = $first->lowercase(Twine\Config\Lowercase::FIRST);
        $lowercasedWords = $first->lowercase(Twine\Config\Lowercase::WORDS);

        $this->assertInstanceOf(Twine\Str::class, $lowercased);
        $this->assertEquals('джон пинкертон', $lowercased);
        $this->assertEquals('дЖОН ПИНКЕРТОН', $lowercasedFirst);
        $this->assertEquals('дЖОН пИНКЕРТОН', $lowercasedWords);
    }

    #[Test]
    public function it_preserves_encoding(): void
    {
        $string = new Twine\Str('JOHN PINKERTON', 'ASCII');

        $lowercased = $string->lowercase();

        $this->assertEquals('ASCII', mb_detect_encoding($lowercased));
    }
}
