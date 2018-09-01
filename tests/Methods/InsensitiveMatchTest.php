<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class InsensitiveMatchTest extends TestCase
{
    public function test_it_can_be_insensitively_matched()
    {
        $string = new Twine\Str('john pinkerton');

        $matches = $string->equals('JoHN PiNKeRToN', Twine\Config\Equals::CASE_INSENSITIVE);
        $matchesAlias = $string->insensitiveMatch('JoHN PiNKeRToN');
        $differs = $string->equals('BoB BeLCHeR', Twine\Config\Equals::CASE_INSENSITIVE);
        $differsAlias = $string->insensitiveMatch('BoB BeLCHeR');

        $this->assertEquals($matches, $matchesAlias);
        $this->assertEquals($differs, $differsAlias);
    }
}
