<?php

namespace PHLAK\Twine\Traits;

use PHLAK\Twine\Config;

trait Convenience
{
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
     * @param mixed ...$args Any number of elements to fill the string
     *
     * @return self
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
