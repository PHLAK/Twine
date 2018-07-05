<?php

namespace PHLAK\Twine\Traits;

use PHLAK\Twine\Config;

trait Convinience
{
    /**
     * Encode the string to or decode from a base64 encoded value.
     *
     * @param string $mode Config\Base64::ENCODE - Encode the string to base64
     *                     Config\Base64::DECODE - Decode the string from base64
     *
     * @throws \PHLAK\Twine\Exceptions\InvalidConfigOptionException
     *
     * @return Str
     */
    public function base64($mode = Config\Base64::ENCODE)
    {
        Config\Base64::validateOption($mode);

        return new static($mode($this->string));
    }

    /**
     * Count the number of occurrences of a substring in the string.
     *
     * @param string $string The substring to count
     *
     * @return int
     */
    public function count($string)
    {
        return substr_count($this->string, $string);
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
