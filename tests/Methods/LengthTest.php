<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class LengthTest extends TestCase
{
    #[Test]
    public function it_has_a_length(): void
    {
        $string = new Twine\Str('john pinkerton');

        $this->assertEquals(14, $string->length());
    }

    public function a_multibyte_string_has_a_length(): void
    {
        $string = new Twine\Str('宮本 茂');

        $length = $string->length();

        $this->assertEquals(4, $length);
    }
}
