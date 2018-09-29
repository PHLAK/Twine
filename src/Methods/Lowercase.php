<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class Lowercase extends Method
{
    /**
     * Convert all or parts of the string to lowercase.
     *
     * @param string $mode A lowercase mode flag
     *
     * Available mode flags:
     *
     *   - Twine\Config\Lowercase::ALL - Lowercase all characters of the string (default)
     *   - Twine\Config\Lowercase::FIRST - Lowercase the first character of the string only
     *   - Twine\Config\Lowercase::WORDS - Lowercase the first character of each word of the string
     *
     * @throws \PHLAK\Twine\Exceptions\ConfigException
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke(string $mode = Twine\Config\Lowercase::ALL) : Twine\Str
    {
        Twine\Config\Lowercase::validateOption($mode);

        if ($mode == Twine\Config\Lowercase::WORDS) {
            $string = preg_replace_callback('/([A-Z][^\s]*)/', function ($matched) {
                return lcfirst($matched[1]);
            }, $this->string);

            return new Twine\Str($string);
        }

        return new Twine\Str($mode($this->string));
    }
}
