<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Depends;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class StrTest extends TestCase
{
    protected function tearDown(): void
    {
        Twine\Config\Str::setEncoding('UTF-8');
    }

    #[Test]
    public function it_can_be_initialized_statically(): void
    {
        $string = Twine\Str::make('john pinkerton');

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('john pinkerton', $string);
    }

    #[Test]
    public function it_can_be_initialized_with_the_helper_function(): void
    {
        $string = str('john pinkerton');

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('john pinkerton', $string);
    }

    #[Test]
    public function it_can_be_accessed_as_a_string(): void
    {
        $string = new Twine\Str('john pinkerton');

        $this->assertEquals('john pinkerton', $string);
    }

    #[Test]
    public function it_can_access_characters_via_array_notation(): void
    {
        $string = new Twine\Str('john pinkerton');

        $this->assertTrue(isset($string[5]));
        $this->assertEquals('p', $string[5]);
    }

    #[Test]
    public function it_throws_an_exception_when_modifying_characters_with_array_notation(): void
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectException(\RuntimeException::class);

        $string[5] = 'z';
    }

    #[Test]
    public function it_throws_an_exception_when_unsetting_characters_with_array_notation(): void
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectException(\RuntimeException::class);

        unset($string[5]);
    }

    #[Test]
    public function it_can_be_converted_to_a_string_when_json_encoded(): void
    {
        $string = new Twine\Str('john pinkerton');

        $json = json_encode(['name' => $string], JSON_THROW_ON_ERROR);

        $this->assertJsonStringEqualsJsonString('{"name":"john pinkerton"}', $json);
    }

    #[Test]
    public function it_can_be_serialized(): string
    {
        $string = new Twine\Str('john pinkerton');

        $serialized = serialize($string);

        $this->assertEquals('O:15:"PHLAK\Twine\Str":2:{s:6:"string";s:14:"john pinkerton";s:8:"encoding";s:5:"UTF-8";}', $serialized);

        return $serialized;
    }

    #[Test, Depends('it_can_be_serialized')]
    public function it_can_be_unserialized(string $serialized): void
    {
        $unserialized = unserialize($serialized);

        $this->assertInstanceOf(Twine\Str::class, $unserialized);
        $this->assertEquals('john pinkerton', $unserialized);
    }

    #[Test]
    public function it_has_a_default_internal_encoding(): void
    {
        $string = new Twine\Str;

        $this->assertEquals('UTF-8', $string->encoding);
    }

    #[Test]
    public function it_can_override_the_default_internal_encoding(): void
    {
        $utf8 = new Twine\Str;
        Twine\Config\Str::setEncoding('ASCII');
        $ascii = new Twine\Str;

        $this->assertEquals('UTF-8', $utf8->encoding);
        $this->assertEquals('ASCII', mb_detect_encoding($ascii));
    }
}
