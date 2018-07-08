<?php

namespace PHLAK\Twine\Config;

use ReflectionClass;
use PHLAK\Twine\Exceptions\InvalidConfigOptionException;

abstract class Config
{
    /**
     * Validate a given configuration option.
     *
     * @param mixed $option A given option
     *
     * @throws \PHLAK\Twine\Exceptions\InvalidConfigOptionException
     *
     * @return void
     */
    public static function validateOption($option)
    {
        $reflection = new ReflectionClass(static::class);
        $constants = $reflection->getConstants();

        if (! in_array($option, $constants, true)) {
            throw new InvalidConfigOptionException(
                "Invalid configuration option '{$option}'. Must be one of: " . implode(', ', $constants)
            );
        }
    }
}
