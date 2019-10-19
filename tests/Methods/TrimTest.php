<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHLAK\Twine\Exceptions\ConfigException;
use PHPUnit\Framework\TestCase;

class TrimTest extends TestCase
{
    public function test_it_can_be_trimed()
    {
        $string = new Twine\Str('   foo bar     ');

        $trimmed = $string->trim();

        $this->assertInstanceOf(Twine\Str::class, $trimmed);
        $this->assertEquals('foo bar', $trimmed);
    }

    public function test_it_can_trim_specific_chracters()
    {
        $string = new Twine\Str('john pinkerton');

        $trimmed = $string->trim('jton');

        $this->assertInstanceOf(Twine\Str::class, $trimmed);
        $this->assertEquals('hn pinker', $trimmed);
    }

    public function test_it_can_trim_characters_from_the_left_only()
    {
        $string = new Twine\Str('john pinkerton');

        $leftTrimmed = $string->trim('jton', Twine\Config\Trim::LEFT);

        $this->assertInstanceOf(Twine\Str::class, $leftTrimmed);
        $this->assertEquals('hn pinkerton', $leftTrimmed);
    }

    public function test_it_can_trim_characters_from_the_right_only()
    {
        $string = new Twine\Str('john pinkerton');

        $rightTrimmed = $string->trim('jton', Twine\Config\Trim::RIGHT);

        $this->assertInstanceOf(Twine\Str::class, $rightTrimmed);
        $this->assertEquals('john pinker', $rightTrimmed);
    }

    public function test_it_throws_an_exception_when_trimming_with_an_invalid_config_option()
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectException(ConfigException::class);

        $string->trim(' ', 'invalid');
    }

    public function test_it_is_multibyte_compatible()
    {
        $string = new Twine\Str('   宮本 茂     ');

        $trimmed = $string->trim();

        $this->assertInstanceOf(Twine\Str::class, $trimmed);
        $this->assertEquals('宮本 茂', $trimmed);
    }

    public function test_it_can_trim_specific_chracters_from_a_multibyte_string()
    {
        $string = new Twine\Str('宮本 茂');

        $trimmed = $string->trim('宮茂');

        $this->assertInstanceOf(Twine\Str::class, $trimmed);
        $this->assertEquals('本 ', $trimmed);
    }
}
