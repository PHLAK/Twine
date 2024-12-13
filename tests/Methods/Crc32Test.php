<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class Crc32Test extends TestCase
{
    #[Test]
    public function it_can_calculate_the_crc32_polynomial(): void
    {
        $string = new Twine\Str('john pinkerton');

        $crc32 = $string->crc32();

        $this->assertEquals(3367853299, $crc32);
    }

    #[Test]
    public function it_can_calculate_the_crc32_polynomial_of_a_multibyte_compatible(): void
    {
        $string = new Twine\Str('宮本 茂');

        $crc32 = $string->crc32();

        $this->assertEquals(2376085100, $crc32);
    }
}
