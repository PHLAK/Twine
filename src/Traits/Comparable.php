<?php

namespace PHLAK\Twine\Traits;

use PHLAK\Twine\Config;

trait Comparable
{
    /**
     * Determine if the string is equal to another string.
     *
     * @param string $string The string to compare against
     * @param string $mode   An equals mode flag
     *
     * Available mode flags:
     *
     *   - Config\Equals::CASE_SENSITIVE - Match the string with case sensitivity (default)
     *   - Config\Equals::CASE_INSENSITIVE - Match the string with case insensitivity
     *
     * @throws \PHLAK\Twine\Exceptions\InvalidConfigOptionException
     *
     * @return bool
     */
    public function equals($string, $mode = Config\Equals::CASE_SENSITIVE)
    {
        Config\Equals::validateOption($mode);

        return $mode($this->string, $string) === 0;
    }

    /**
     * Determine if the string starts with another string.
     *
     * @param string $string The string to compare against
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
     * @param string $string The string to compare against
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
     * @param string $string The string to compare against
     *
     * @return bool True if the string contains $string, otherwise false
     */
    public function contains($string)
    {
        return strpos($this->string, $string) !== false;
    }
}
