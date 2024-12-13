<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class EncodingTest extends TestCase
{
    #[Test]
    public function it_can_set_the_internal_encoding(): void
    {
        $string = new Twine\Str('john pinkerton');

        $ascii = $string->encoding('ASCII');

        $this->assertInstanceOf(Twine\Str::class, $ascii);
        $this->assertEquals('ASCII', mb_detect_encoding($ascii));
    }
}
