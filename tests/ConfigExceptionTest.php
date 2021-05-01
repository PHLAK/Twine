<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine\Exceptions\ConfigException;
use PHLAK\Twine\Exceptions\TwineException;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class ConfigExceptionTest extends TestCase
{
    public function test_it_extends_the_base_twine_exception()
    {
        $exception = new ConfigException();

        $this->assertInstanceOf(TwineException::class, $exception);
    }
}
