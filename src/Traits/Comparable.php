<?php

namespace PHLAK\Twine\Traits;

use PHLAK\Twine\Config;

trait Comparable
{
    /**
     * Determine if the string is equal to another string.
     *
     * @param string $string A string to compare against
     * @param string $mode Config\Equals::EXACT - Match the string exactly (default)
     *                     Config\Equals::CASE_INSENSITIVE - Case insensitive match
     *
     * @throws \PHLAK\Twine\Exceptions\InvalidConfigOptionException
     *
     * @return bool
     */
    public function equals($string, $mode = Config\Equals::EXACT)
    {
        Config\Equals::validateOption($mode);

        return $mode($this->string, $string) === 0;
    }

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
