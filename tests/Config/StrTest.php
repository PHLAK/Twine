<?php

namespace PHLAK\Twine\Tests\Config;

use PHLAK\Twine;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class StrTest extends TestCase
{
    protected function tearDown(): void
    {
        Twine\Config\Str::setEncoding('UTF-8');
    }

    #[Test]
    public function it_can_set_and_get_the_encoding(): void
    {
        Twine\Config\Str::setEncoding('ASCII');

        $this->assertEquals('ASCII', Twine\Config\Str::getEncoding());
    }

    #[Test]
    public function it_throws_an_exception_when_trying_to_set_an_invalid_encoding(): void
    {
        $this->expectException(Twine\Exceptions\ConfigException::class);

        Twine\Config\Str::setEncoding('invalid');
    }
}
