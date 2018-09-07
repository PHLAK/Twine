<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHLAK\Twine\Exceptions\ConfigException;
use PHPUnit\Framework\TestCase;

class LowercaseWordsTest extends TestCase
{
    public function test_it_has_an_alias_for_lowercase_words()
    {
        $string = new Twine\Str('JOHN PINKERTON');

        $lcWords = $string->lowercase(Twine\Config\Lowercase::WORDS);
        $alias = $string->lowercaseWords();

        $this->assertInstanceOf(Twine\Str::class, $alias);
        $this->assertEquals($lcWords, $alias);
    }
}
