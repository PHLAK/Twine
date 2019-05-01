<?php

namespace PHLAK\Twine\Tests;

use PHPUnit\Framework\TestCase as BaseTest;
use ReflectionClass;

class TestCase extends BaseTest
{
    protected function getAttributeValue($object, string $property)
    {
        $reflection = new ReflectionClass($object);
        $property = $reflection->getProperty($property);
        $property->setAccessible(true);

        return $property->getValue($object);
    }
}
