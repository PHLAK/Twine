<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class HexEncodeTest extends TestCase
{
    #[Test]
    public function it_can_be_hex_encoded(): void
    {
        $string = new Twine\Str('john pinkerton');

        $hex = $string->hexEncode();

        $this->assertInstanceOf(Twine\Str::class, $hex);
        $this->assertEquals('\x6a\x6f\x68\x6e\x20\x70\x69\x6e\x6b\x65\x72\x74\x6f\x6e', $hex);
    }

    public function a_multibyte_string_can_be_hex_encoded(): void
    {
        $string = new Twine\Str('宮本 茂');

        $hex = $string->hexEncode();

        $this->assertInstanceOf(Twine\Str::class, $hex);
        $this->assertEquals('\x5bae\x672c\x20\x8302', $hex);
    }
}
