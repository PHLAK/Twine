<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class CountTest extends TestCase
{
    public function test_it_can_count_substring_occurrences()
    {
        $string = new Twine\Str('How much wood could a woodchuck chuck if a woodchuck could chuck wood?');

        $count = $string->count('wood');

        $this->assertEquals(4, $count);
    }

    public function test_it_can_count_substring_occurrences_in_a_multibyte_string()
    {
        $string = new Twine\Str('宮本 茂 宮本 茂 宮本');

        $count = $string->count('宮本');

        $this->assertEquals(3, $count);
    }
}
