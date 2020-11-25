<?php

namespace PHLAK\Twine\Traits;

use PHLAK\Twine\Config;

trait Comparable
{
    /**
     * Determine if the string is equal to another string.
     *
     * @param string $string The string to compare against
     * @param string $mode An equals mode flag
     *
     * Available mode flags:
     *
     *   - Twine\Config\Equals::CASE_SENSITIVE - Match the string with case sensitivity (default)
     *   - Twine\Config\Equals::CASE_INSENSITIVE - Match the string with case insensitivity
     *
     * @throws \PHLAK\Twine\Exceptions\ConfigException
     *
     * @return bool True if the string matches the comparing string
     */
    public function equals(string $string, string $mode = Config\Equals::CASE_SENSITIVE): bool
    {
        Config\Equals::validateOption($mode);

        return $mode($this->string, $string) === 0;
    }

    /**
     * Determine if the string matches a regular expression pattern.
     *
     * @param string $pattern A regular expression pattern
     *
     * @return bool True if the string matches the regular expression pattern
     */
    public function matches(string $pattern): bool
    {
        return (bool) preg_match($pattern, $this->string);
    }

    /**
     * Determine if the string starts with another string.
     *
     * @param string $string The string to compare against
     *
     * @return bool True if the string starts with $string, otherwise false
     */
    public function startsWith(string $string): bool
    {
        if ($this->string === '' || $string === '') {
            return false;
        }

        if (strpos($this->string, $string) === 0) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the string ends with another string.
     *
     * @param string $string The string to compare against
     *
     * @return bool True if the string ends with $string, otherwise false
     */
    public function endsWith(string $string): bool
    {
        if ($this->string === '' || $string === '') {
            return false;
        }

        return mb_substr($this->string, -mb_strlen($string, $this->encoding), null, $this->encoding) === $string;
    }

    /**
     * Determine if the string contains another string.
     *
     * @param string $string The string to compare against
     *
     * @return bool True if the string contains $string, otherwise false
     */
    public function contains(string $string): bool
    {
        return mb_strpos($this->string, $string, 0, $this->encoding) !== false;
    }

    /**
     * Determine if the string exists in another string.
     *
     * @param string $string The string to compare against
     * @param string $mode Flag for case-sensitive and case-insensitive mode
     *
     * Available mode flags:
     *
     *   - Twine\Config\In::CASE_SENSITIVE - Match the string with case sensitivity (default)
     *   - Twine\Config\In::CASE_INSENSITIVE - Match the string with case insensitivity
     *
     * @throws \PHLAK\Twine\Exceptions\ConfigException
     *
     * @return bool True if the string exists in $string, otherwise false
     */
    public function in(string $string, string $mode = Config\In::CASE_SENSITIVE): bool
    {
        Config\In::validateOption($mode);

        return $mode($string, $this->string, 0, $this->encoding) !== false;
    }

    /**
     * Calculate the similarity percentage between two strings.
     *
     * @param string $string The string to compare against
     */
    public function similarity(string $string): float
    {
        similar_text($this->string, $string, $percent);

        return $percent;
    }
}
