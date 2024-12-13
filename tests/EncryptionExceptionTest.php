<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine\Exceptions\EncryptionException;
use PHLAK\Twine\Exceptions\TwineException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(EncryptionException::class)]
class EncryptionExceptionTest extends TestCase
{
    #[Test]
    public function it_extends_the_base_twine_exception(): void
    {
        $exception = new EncryptionException;

        $this->assertInstanceOf(TwineException::class, $exception);
    }
}
