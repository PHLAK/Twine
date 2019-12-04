<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine\Exceptions\DecryptionException;
use PHLAK\Twine\Exceptions\TwineException;
use PHPUnit\Framework\TestCase;

class DecryptionExceptionTest extends TestCase
{
    public function test_it_extends_the_base_twine_exception()
    {
        $exception = new DecryptionException();

        $this->assertInstanceOf(TwineException::class, $exception);
    }
}
