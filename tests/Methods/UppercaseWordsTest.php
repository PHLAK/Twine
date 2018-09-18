<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class UppercaseWordsTest extends TestCase
{
    public function test_it_can_uppercase_the_first_letter_of_each_word()
    {
        $string = new Twine\Str('john pinkerton');

        $ucWords = $string->uppercaseWords();

        $this->assertInstanceOf(Twine\Str::class, $ucWords);
        $this->assertEquals('John Pinkerton', $ucWords);
    }
}
