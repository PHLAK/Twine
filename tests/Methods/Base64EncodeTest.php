<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class Base64EncodeTest extends TestCase
{
    #[Test]
    public function it_has_can_be_base64_encoded(): void
    {
        $string = new Twine\Str('john pinkerton');

        $base64 = $string->base64Encode();

        $this->assertInstanceOf(Twine\Str::class, $base64);
        $this->assertEquals('am9obiBwaW5rZXJ0b24=', $base64);
    }

    #[Test]
    public function a_multibyte_string_can_be_base64_encoded(): void
    {
        $string = new Twine\Str('宮本 茂');

        $base64 = $string->base64Encode();

        $this->assertInstanceOf(Twine\Str::class, $base64);
        $this->assertEquals('5a6u5pysIOiMgg==', $base64);
    }
}
