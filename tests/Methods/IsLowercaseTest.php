<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class IsLowercaseTest extends TestCase
{
    #[Test]
    public function it_can_determine_if_the_string_is_lowercase(): void
    {
        $string = new Twine\Str('johnpinkerton');

        $lowercase = $string->isLowercase();

        $this->assertTrue($lowercase);
    }

    #[Test]
    public function it_can_determine_if_the_string_is_not_lowercase(): void
    {
        $string = new Twine\Str('JohnPinkerton');

        $notLowercase = $string->isLowercase();

        $this->assertFalse($notLowercase);
    }

    #[Test]
    public function it_can_determine_if_a_multibyte_string_is_lowercase(): void
    {
        $string = new Twine\Str('任天堂');

        $lowercase = $string->isLowercase();

        $this->assertFalse($lowercase);
    }
}
