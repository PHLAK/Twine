<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class LowercaseFirstTest extends TestCase
{
    public function test_it_can_lowercase_the_first_letter_only()
    {
        $string = new Twine\Str('JOHN PINKERTON');

        $lcFirst = $string->lowercaseFirst();

        $this->assertInstanceOf(Twine\Str::class, $lcFirst);
        $this->assertEquals('jOHN PINKERTON', $lcFirst);
    }
}
