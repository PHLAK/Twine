<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(Twine\Str::class)]
class ArrayAccessTest extends TestCase
{
    #[Test]
    public function it_can_be_returned_as_a_string(): void
    {
        $string = new Twine\Str('john pinkerton');

        $this->assertEquals('john pinkerton', $string);
    }

    #[Test]
    public function it_can_be_access_characters_via_array_notation(): void
    {
        $string = new Twine\Str('john pinkerton');

        $this->assertTrue(isset($string[5]));
        $this->assertEquals('p', $string[5]);
    }
}
