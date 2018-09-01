<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class UrlTest extends TestCase
{
    public function test_it_can_be_url_encoded()
    {
        $string = new Twine\Str('john pinkerton');

        $urlencoded = $string->urlencode();

        $this->assertEquals('john+pinkerton', $urlencoded);
    }

    // public function test_it_can_be_url_decoded()

    // public function test_a_multibyte_string_can_be_url_encoded()
    // $string = new Twine\Str('宮本 茂');

    //  public function test_a_multibyte_string_can_be_url_decoded()
    // $string = new Twine\Str('宮本 茂');
}
