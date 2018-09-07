<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHLAK\Twine\Exceptions\ConfigException;
use PHPUnit\Framework\TestCase;

class UppercaseWordsTest extends TestCase
{
    public function test_it_has_an_alias_for_uppercase_words()
    {
        $string = new Twine\Str('john pinkerton');

        $ucWords = $string->uppercase(Twine\Config\Uppercase::WORDS);
        $alias = $string->uppercaseWords();

        $this->assertInstanceOf(Twine\Str::class, $alias);
        $this->assertEquals($ucWords, $alias);
    }
}
