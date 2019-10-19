<?php

namespace PHLAK\Twine\Tests\Methods;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class Sha1Test extends TestCase
{
    public function test_it_can_be_hashed_with_sha1()
    {
        $string = new Twine\Str('john pinkerton');

        $sha1 = $string->sha1();
        $raw = $string->sha1(Twine\Config\Sha1::RAW);

        $this->assertInstanceOf(Twine\Str::class, $sha1);
        $this->assertEquals('fcaf28c7705ba8f267472bb5aa8ad883f6bf0427', $sha1);
        $this->assertEquals(base64_decode('/K8ox3BbqPJnRyu1qorYg/a/BCc='), $raw);
    }

    public function test_a_multibyte_string_can_be_hashed_with_sha1()
    {
        $string = new Twine\Str('宮本 茂');

        $sha1 = $string->sha1();
        $raw = $string->sha1(Twine\Config\Sha1::RAW);

        $this->assertInstanceOf(Twine\Str::class, $sha1);
        $this->assertEquals('606d67644969b213dbd54696de4b428caa4acb1f', $sha1);
        $this->assertEquals(base64_decode('YG1nZElpshPb1UaW3ktCjKpKyx8='), $raw);
    }

    public function test_it_preserves_encoding()
    {
        $string = new Twine\Str('john pinkerton', 'ASCII');

        $sha1 = $string->sha1();

        $this->assertAttributeEquals('ASCII', 'encoding', $sha1);
    }
}
