<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class StrTest extends TestCase
{
    protected function tearDown(): void
    {
        Twine\Config\Str::setEncoding('UTF-8');
    }

    public function test_it_can_be_initialized_statically()
    {
        $string = Twine\Str::make('john pinkerton');

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('john pinkerton', $string);
    }

    public function test_it_can_be_initialized_with_the_helper_function()
    {
        $string = str('john pinkerton');

        $this->assertInstanceOf(Twine\Str::class, $string);
        $this->assertEquals('john pinkerton', $string);
    }

    public function test_it_can_be_accessed_as_a_string()
    {
        $string = new Twine\Str('john pinkerton');

        $this->assertEquals('john pinkerton', $string);
    }

    public function test_it_can_access_characters_via_array_notation()
    {
        $string = new Twine\Str('john pinkerton');

        $this->assertTrue(isset($string[5]));
        $this->assertEquals('p', $string[5]);
    }

    public function test_it_throws_an_exception_when_modifying_characters_with_array_notation()
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectException(\RuntimeException::class);

        $string[5] = 'z';
    }

    public function test_it_throws_an_exception_when_unsetting_characters_with_array_notation()
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectException(\RuntimeException::class);

        unset($string[5]);
    }

    public function test_it_can_be_converted_to_a_string_when_json_encoded()
    {
        $string = new Twine\Str('john pinkerton');

        $json = json_encode(['name' => $string]);

        $this->assertJsonStringEqualsJsonString('{"name":"john pinkerton"}', $json);
    }

    public function test_it_can_be_serialized()
    {
        $string = new Twine\Str('john pinkerton');

        $serialized = serialize($string);

        $this->assertEquals('C:15:"PHLAK\Twine\Str":22:{s:14:"john pinkerton";}', $serialized);

        return $serialized;
    }

    /** @depends test_it_can_be_serialized */
    public function test_it_can_be_unserialized($serialized)
    {
        $unserialized = unserialize($serialized);

        $this->assertInstanceOf(Twine\Str::class, $unserialized);
        $this->assertEquals('john pinkerton', $unserialized);
    }

    public function test_it_has_a_default_internal_encoding()
    {
        $string = new Twine\Str();

        $this->assertEquals('UTF-8', $this->getPropertyValue($string, 'encoding'));
    }

    public function test_it_can_override_the_default_internal_encoding()
    {
        $utf8 = new Twine\Str();
        Twine\Config\Str::setEncoding('ASCII');
        $ascii = new Twine\Str();

        $this->assertEquals('UTF-8', $this->getPropertyValue($utf8, 'encoding'));
        $this->assertEquals('ASCII', mb_detect_encoding($ascii));
    }
}
