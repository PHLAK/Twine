<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine\Exceptions\DecryptionException;
use PHLAK\Twine\Exceptions\TwineException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(DecryptionException::class)]
class DecryptionExceptionTest extends TestCase
{
    #[Test]
    public function it_extends_the_base_twine_exception(): void
    {
        $exception = new DecryptionException;

        $this->assertInstanceOf(TwineException::class, $exception);
    }
}
