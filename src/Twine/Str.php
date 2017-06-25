<?php

namespace Twine;

use Twine\Exceptions\InvalidTypeException;

class Str
{
    /** @var string A string */
    protected $string;

    /**
     * Str constructor, runs on object creation.
     *
     * @param string $string A string
     */
    public function __construct($string = null)
    {
        $this->string = $string;
    }

    /**
     * Magic toString method.
     *
     * @return string The string
     */
    public function __toString()
    {
        return $this->string;
    }

    /**
     * Get the length of the string.
     *
     * @return int Length of the string
     */
    public function length()
    {
        return strlen($this->string);
    }

    /**
     * Append a suffix to the string.
     *
     * @param string $suffix A suffix to append
     *
     * @return Twine\Str
     */
    public function append($suffix)
    {
        return new static($this->string . $suffix);
    }

    /**
     * Prepend the string with a prefix.
     *
     * @param string $prefix A prefix to prepend
     *
     * @return Twine\Str
     */
    public function prepend($prefix)
    {
        return new static($prefix . $this->string);
    }

    /**
     * Reverse the string.
     *
     * @return Twine\Str
     */
    public function reverse()
    {
        return new static(strrev($this->string));
    }

    /**
     * Convert all or parts of the string to uppercase.
     *
     * @param string $type Config::UC_ALL - Uppercase all characters of the string
     *                     Config::UC_FIRST - Uppercase the first character of the string only
     *                     Config::UC_WORDS - Uppercase the first character of each word of the string
     *
     * @return Twine\Str
     */
    public function uppercase($type = Config::UC_ALL)
    {
        if (! in_array($type, [Config::UC_ALL, Config::UC_FIRST, Config::UC_WORDS])) {
            throw new InvalidTypeException('$type must be one of Config::UC_ALL, Config::UC_FIRST, Config::UC_WORDS');
        }

        return new static($type($this->string));
    }

    /**
     * Remove whitespace or a specific set of characters from the beginning
     * and/or end of the string.
     *
     * @param string $mask A list of characters to be stripped (default: Config::TRIM_MASK)
     * @param string $type Config::TRIM_BOTH - Trim characters from the beginning and end of the string
     *                     Config::TRIM_LEFT - Only trim characters from the begining of the string
     *                     Config::TRIM_RIGHT - Only trim characters from the end of the strring
     *
     * @return Twine\Str
     */
    public function trim($mask = Config::TRIM_MASK, $type = Config::TRIM_BOTH)
    {
        if (! in_array($type, [Config::TRIM_BOTH, Config::TRIM_LEFT, Config::TRIM_RIGHT])) {
            throw new InvalidTypeException('$type must be one of Config::TRIM_BOTH, Config::TRIM_LEFT, Config::TRIM_RIGHT');
        }

        return new static($type($this->string, $mask));
    }
}
