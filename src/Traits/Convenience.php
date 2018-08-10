<?php

namespace PHLAK\Twine\Traits;

trait Convenience
{
    /**
     * Count the number of occurrences of a substring in the string.
     *
     * @param string $string The substring to count
     *
     * @return int
     */
    public function count(string $string) : int
    {
        return mb_substr_count($this->string, $string);
    }

    /**
     * Return the formatted string.
     *
     * @param mixed ...$args Any number of elements to fill the string
     *
     * @return self
     */
    public function format(...$args) : self
    {
        return new static(sprintf($this->string, ...$args));
    }

    /**
     * Get the length of the string.
     *
     * @return int Length of the string
     */
    public function length() : int
    {
        return mb_strlen($this->string);
    }
}
