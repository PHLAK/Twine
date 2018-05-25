<?php

namespace PHLAK\Twine\Traits;

trait Comparable
{
    /**
     * Determine if the string starts with another string.
     *
     * @param  string $string The string to compare against
     *
     * @return bool True if the string starts with $string, otherwise false
     */
    public function startsWith($string)
    {
        return substr($this->string, 0, strlen($string)) == $string;
    }

    /**
     * Determine if the string ends with another string.
     *
     * @param  string $string The string to compare against
     *
     * @return bool True if the string ends with $string, otherwise false
     */
    public function endsWith($string)
    {
        return substr($this->string, -strlen($string)) == $string;
    }

    /**
     * Determine if the string contains another string.
     *
     * @param  string $string The string to compare against
     *
     * @return bool True if the string contains $string, otherwise false
     */
    public function contains($string)
    {
        return strpos($this->string, $string) !== false;
    }
}
