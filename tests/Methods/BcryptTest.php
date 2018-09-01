<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class BcryptTest extends TestCase
{
    public function test_it_can_be_hashed_with_bcrypt()
    {
        $string = new Twine\Str('john pinkerton');

        $bcrypt = $string->bcrypt();

        $this->assertInstanceOf(Twine\Str::class, $bcrypt);
        $this->assertRegExp('/\$2y\$10\$[a-zA-Z0-9+.\/]{53}/', (string) $bcrypt);
    }

    public function test_a_multibyte_string_can_be_hashed_with_bcrypt()
    {
        $string = new Twine\Str('宮本 茂');

        $bcrypt = $string->bcrypt();

        $this->assertInstanceOf(Twine\Str::class, $bcrypt);
        $this->assertRegExp('/\$2y\$10\$[a-zA-Z0-9+.\/]{53}/', (string) $bcrypt);
    }
}
