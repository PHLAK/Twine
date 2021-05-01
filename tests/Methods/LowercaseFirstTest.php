<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class LowercaseFirstTest extends TestCase
{
    public function test_it_can_lowercase_the_first_letter_only()
    {
        $string = new Twine\Str('JOHN PINKERTON');

        $lcFirst = $string->lowercaseFirst();

        $this->assertInstanceOf(Twine\Str::class, $lcFirst);
        $this->assertEquals('jOHN PINKERTON', $lcFirst);
    }

    public function test_it_can_lowercase_the_first_letter_of_a_multibyte_string()
    {
        $first = new Twine\Str('ДЖОН ПИНКЕРТОН');

        $lowercasedFirst = $first->lowercaseFirst();

        $this->assertInstanceOf(Twine\Str::class, $lowercasedFirst);
        $this->assertEquals('дЖОН ПИНКЕРТОН', $lowercasedFirst);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('JOHN PINKERTON', 'ASCII');

        $lowercasedFirst = $string->lowercaseFirst();

        $this->assertEquals('ASCII', mb_detect_encoding($lowercasedFirst));
    }
}
