<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class Base64DecodeTest extends TestCase
{
    #[Test]
    public function it_can_be_base64_decoded(): void
    {
        $string = new Twine\Str('am9obiBwaW5rZXJ0b24=');

        $plaintext = $string->base64Decode();

        $this->assertInstanceOf(Twine\Str::class, $plaintext);
        $this->assertEquals('john pinkerton', $plaintext);
    }

    #[Test]
    public function a_multibyte_string_can_be_base64_decoded(): void
    {
        $string = new Twine\Str('5a6u5pysIOiMgg==');

        $plaintext = $string->base64Decode();

        $this->assertInstanceOf(Twine\Str::class, $plaintext);
        $this->assertEquals('宮本 茂', $plaintext);
    }
}
