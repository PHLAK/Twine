<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class IsPunctuationTest extends TestCase
{
    #[Test]
    public function it_can_determine_if_the_string_is_punctuation(): void
    {
        $string = new Twine\Str('*&$();,.?');

        $punctuation = $string->isPunctuation();

        $this->assertTrue($punctuation);
    }

    #[Test]
    public function it_can_determine_if_the_string_is_not_punctuation(): void
    {
        $string = new Twine\Str('john pinkerton');

        $notPunctuation = $string->isPunctuation();

        $this->assertFalse($notPunctuation);
    }

    #[Test]
    public function it_can_determine_if_a_multibyte_string_is_punctuation(): void
    {
        $string = new Twine\Str('任天堂');

        $punctuation = $string->isPunctuation();

        $this->assertFalse($punctuation);
    }
}
