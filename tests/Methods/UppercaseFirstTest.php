<?php

namespace PHLAK\Twine\Tests;

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
}
