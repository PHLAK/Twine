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
     *   - Twine\Config\Equals::CASE_SENSITIVE - Match the string with case sensitivity (default)
     *   - Twine\Config\Equals::CASE_INSENSITIVE - Match the string with case insensitivity
     *
     * @throws \PHLAK\Twine\Exceptions\InvalidConfigOptionException
     *
     * @return bool True if the string matches the comparing string
     */
    public function equals(string $string, string $mode = Config\Equals::CASE_SENSITIVE) : bool
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
    public function startsWith(string $string) : bool
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
    public function endsWith(string $string) : bool
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
    public function contains(string $string) : bool
    {
        return strpos($this->string, $string) !== false;
    }

    /**
     * Calculate the similarity percentage between two strings.
     *
     * @param string $string The string to compare against
     *
     * @return float
     */
    public function similarity(string $string) : float
    {
        similar_text($this->string, $string, $percent);

        return $percent;
    }
}
