<?php

namespace PHLAK\Twine\Traits;

use PHLAK\Twine\Config;

trait Containable
{
    /**
     * Determine if the given string contains the current string.
     *
     * @param string $string The string (haystack) to check if current string (needle) exists in it
     * @param string $mode   Flag for case-sensitive and case-insensitive mode
     *
     * Available mode flags:
     *
     *   - Twine\Config\In::CASE_SENSITIVE - Match the string with case sensitivity (default)
     *   - Twine\Config\In::CASE_INSENSITIVE - Match the string with case insensitivity
     *
     * @throws \PHLAK\Twine\Exceptions\ConfigException
     *
     * @return bool True if the given string contains the current string
     */
    public function in(string $string, string $mode = Config\In::CASE_SENSITIVE) : bool
    {
        Config\In::validateOption($mode);

        return $mode($string, $this->string, 0) !== false;
    }
}
