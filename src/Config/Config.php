<?php

namespace PHLAK\Twine\Config;

use PHLAK\Twine\Exceptions\ConfigException;
use ReflectionClass;

abstract class Config
{
    /**
     * Validate a given configuration option.
     *
     * @param mixed $option A given option
     *
     * @throws \PHLAK\Twine\Exceptions\ConfigException
     */
    public static function validateOption($option): void
    {
        $reflection = new ReflectionClass(static::class);
        $constants = $reflection->getConstants();

        if (! in_array($option, $constants, true)) {
            throw new ConfigException("Invalid configuration option '{$option}'. Must be one of: " . implode(', ', $constants));
        }
    }
}
