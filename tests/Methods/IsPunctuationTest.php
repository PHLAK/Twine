<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class IsPunctuationTest extends TestCase
{
    public function test_it_can_determine_if_the_string_is_punctuation()
    {
        $string = new Twine\Str('*&$();,.?');

        $punctuation = $string->isPunctuation();

        $this->assertTrue($punctuation);
    }

    public function test_it_can_determine_if_the_string_is_not_punctuation()
    {
        $string = new Twine\Str('john pinkerton');

        $notPunctuation = $string->isPunctuation();

        $this->assertFalse($notPunctuation);
    }

    public function test_it_can_determine_if_a_multibyte_string_is_punctuation()
    {
        $string = new Twine\Str('任天堂');

        $punctuation = $string->isPunctuation();

        $this->assertFalse($punctuation);
    }
}
