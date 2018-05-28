<?php

namespace PHLAK\Twine\Traits;

use PHLAK\Twine\Config;
use PHLAK\Twine\Exceptions\InvalidConfigOptionException;

trait Convinience
{
    /**
     * Encode the string to or decode from a base64 encoded value.
     *
     * @param string $mode Config::BASE64_ENCODE - Encode the string to base64
     *                     Config::BASE64_DECODE - Decode the string from base64
     *
     * @return Str
     */
    public function base64($mode = Config::BASE64_ENCODE)
    {
        $base64Types = [Config::BASE64_ENCODE, Config::BASE64_DECODE];

        if (! function_exists($mode)) {
            throw new InvalidConfigOptionException("Invalid $mode specified");
        }

        return new static($mode($this->string));
    }

    /**
     * Count the number of occurences of a substring in the string.
     *
     * @param string $string Substring to count
     *
     * @return int
     */
    public function count($string)
    {
        return substr_count($this->string, $string);
    }

    /**
     * Determine if the string is equal to another string.
     *
     * @param string $string A string to compare against
     *
     * @return bool
     */
    public function equals($string, $mode = Config::EQ_EXACT)
    {
        return $mode($this->string, $string) === 0;
    }

    /**
     * Return the formatted string.
     *
     * @param mixed $args Any number of elements to fill the string
     *
     * @return Str
     */
    public function format(...$args)
    {
        return new static(sprintf($this->string, ...$args));
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
}
