<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class Wrap extends Method
{
    /**
     * Wrap the string to a given number of characters.
     *
     * @param int    $width Number of characters at which to wrap
     * @param string $break Character used to break the string
     * @param bool   $mode  A wrap mode flag
     *
     * Available wrap modes:
     *
     *   - Twine\Config\Wrap::SOFT - Wrap at the first whitespace character after the specified width (default)
     *   - Twine\Config\Wrap::HARD - Always wrap at or before the specified width
     *
     * @throws \PHLAK\Twine\Exceptions\ConfigException
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke(int $width, string $break = "\n", bool $mode = Twine\Config\Wrap::SOFT) : Twine\Str
    {
        Twine\Config\Wrap::validateOption($mode);

        return new Twine\Str(wordwrap($this->string, $width, $break, $mode));
    }
}
