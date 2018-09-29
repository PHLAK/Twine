<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class Trim extends Method
{
    /**
     * Remove white space or a specific set of characters from the beginning
     * and/or end of the string.
     *
     * @param string $mask A list of characters to be stripped (default: " \t\n\r\0\x0B")
     * @param string $mode A trim mode flag
     *
     * Available trim modes:
     *
     *   - Twine\Config\Trim::BOTH - Trim characters from the beginning and end of the string (default)
     *   - Twine\Config\Trim::LEFT - Only trim characters from the begining of the string
     *   - Twine\Config\Trim::RIGHT - Only trim characters from the end of the strring
     *
     * @throws \PHLAK\Twine\Exceptions\ConfigException
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke(string $mask = " \t\n\r\0\x0B", string $mode = Twine\Config\Trim::BOTH) : Twine\Str
    {
        Twine\Config\Trim::validateOption($mode);

        return new Twine\Str($mode($this->string, $mask));
    }
}
