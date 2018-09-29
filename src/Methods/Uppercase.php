<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class Uppercase extends Method
{
    /**
     * Convert all or parts of the string to uppercase.
     *
     * @param string $mode An uppercase mode flag
     *
     * Available mode flags:
     *
     *   - Twine\Config\Uppercase::ALL - Uppercase all characters of the string (default)
     *   - Twine\Config\Uppercase::FIRST - Uppercase the first character of the string only
     *   - Twine\Config\Uppercase::WORDS - Uppercase the first character of each word of the string
     *
     * @throws \PHLAK\Twine\Exceptions\ConfigException
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke(string $mode = Twine\Config\Uppercase::ALL) : Twine\Str
    {
        Twine\Config\Uppercase::validateOption($mode);

        return new Twine\Str($mode($this->string));
    }
}
