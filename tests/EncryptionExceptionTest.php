<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine\Exceptions\EncryptionException;
use PHLAK\Twine\Exceptions\TwineException;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class EncryptionExceptionTest extends TestCase
{
    public function test_it_extends_the_base_twine_exception()
    {
        $exception = new EncryptionException;

        $this->assertInstanceOf(TwineException::class, $exception);
    }
}
