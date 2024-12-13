<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class IsUppercaseTest extends TestCase
{
    #[Test]
    public function it_can_determine_if_the_string_is_uppercase(): void
    {
        $string = new Twine\Str('JOHNPINKERTON');

        $uppercase = $string->isUppercase();

        $this->assertTrue($uppercase);
    }

    #[Test]
    public function it_can_determine_if_the_string_is_not_uppercase(): void
    {
        $string = new Twine\Str('JohnPinkerton');

        $notUppercase = $string->isUppercase();

        $this->assertFalse($notUppercase);
    }

    #[Test]
    public function it_can_determine_if_a_multibyte_string_is_uppercase(): void
    {
        $string = new Twine\Str('任天堂');

        $uppercase = $string->isUppercase();

        $this->assertFalse($uppercase);
    }
}
