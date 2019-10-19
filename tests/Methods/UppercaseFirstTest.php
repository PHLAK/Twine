<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class UppercaseFirstTest extends TestCase
{
    public function test_it_can_uppercase_the_first_letter_only()
    {
        $string = new Twine\Str('john pinkerton');

        $ucFirst = $string->uppercaseFirst();

        $this->assertInstanceOf(Twine\Str::class, $ucFirst);
        $this->assertEquals('John pinkerton', $ucFirst);
    }

    public function test_it_can_uppercase_the_first_letter_of_a_multibyte_string()
    {
        $string = new Twine\Str('джон пинкертон');

        $uppercasedFirst = $string->uppercaseFirst();

        $this->assertInstanceOf(Twine\Str::class, $uppercasedFirst);
        $this->assertEquals('Джон пинкертон', $uppercasedFirst);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $uppercasedFirst = $string->uppercaseFirst();

        $this->assertAttributeEquals('ASCII', 'encoding', $uppercasedFirst);
    }
}
