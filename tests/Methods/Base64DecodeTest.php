<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class Base64DecodeTest extends TestCase
{
    public function test_it_can_be_base64_decoded()
    {
        $string = new Twine\Str('am9obiBwaW5rZXJ0b24=');

        $plaintext = $string->base64(Twine\Config\Base64::DECODE);
        $alias = $string->base64Decode();

        $this->assertEquals($plaintext, $alias);
    }
}
