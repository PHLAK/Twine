<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class Base64EncodeTest extends TestCase
{
    public function test_it_has_can_be_base64_encoded()
    {
        $string = new Twine\Str('john pinkerton');

        $base64 = $string->base64(Twine\Config\Base64::ENCODE);
        $alias = $string->base64Encode();

        $this->assertEquals($base64, $alias);
    }
}
