<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class Equals extends Method
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
     * @throws \PHLAK\Twine\Exceptions\ConfigException
     *
     * @return bool True if the string matches the comparing string
     */
    public function __invoke(string $string, string $mode = Twine\Config\Equals::CASE_SENSITIVE) : bool
    {
        Twine\Config\Equals::validateOption($mode);

        return $mode($this->string, $string) === 0;
    }
}
