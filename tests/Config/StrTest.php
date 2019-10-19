<?php

namespace PHLAK\Twine\Tests\Config;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class StrTest extends TestCase
{
    protected function tearDown()
    {
        Twine\Config\Str::setEncoding('UTF-8');
    }

    public function test_it_can_set_and_get_the_encoding()
    {
        Twine\Config\Str::setEncoding('ASCII');

        $this->assertEquals('ASCII', Twine\Config\Str::getEncoding('ASCII'));
    }

    public function test_it_throws_an_exception_when_trying_to_set_an_invalid_encoding()
    {
        $this->expectException(Twine\Exceptions\ConfigException::class);

        Twine\Config\Str::setEncoding('invalid');
    }
}
