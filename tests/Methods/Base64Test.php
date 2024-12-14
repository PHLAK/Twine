<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHLAK\Twine\Str;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Depends;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class Base64Test extends TestCase
{
    #[Test]
    public function it_can_be_base64_encoded(): Str
    {
        $string = new Twine\Str('john pinkerton');

        $base64 = $string->base64();

        $this->assertInstanceOf(Twine\Str::class, $base64);
        $this->assertEquals('am9obiBwaW5rZXJ0b24=', $base64);

        return $base64;
    }

    #[Test, Depends('it_can_be_base64_encoded')]
    public function test_it_can_be_base64_decoded(Twine\Str $string): void
    {
        $plaintext = $string->base64(Twine\Config\Base64::DECODE);

        $this->assertInstanceOf(Twine\Str::class, $plaintext);
        $this->assertEquals('john pinkerton', $plaintext);
    }

    #[Test]
    public function a_multibyte_string_can_be_base64_encoded(): void
    {
        $string = new Twine\Str('宮本 茂');

        $base64 = $string->base64();

        $this->assertInstanceOf(Twine\Str::class, $base64);
        $this->assertEquals('5a6u5pysIOiMgg==', $base64);
    }
}
