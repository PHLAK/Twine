<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class Pad extends Method
{
    /**
     * Pad the string to a specific length.
     *
     * @param int    $length  Length to pad the string to
     * @param string $padding Character to pad the string with
     * @param int    $mode    A pad mode flag
     *
     * Available mode flags:
     *
     *   - Twine\Config\Pad::RIGHT - Only pad the right side of the string (default)
     *   - Twine\Config\Pad::LEFT - Only pad the left side of the string
     *   - Twine\Config\Pad::BOTH - Pad both sides of the string
     *
     * @throws \PHLAK\Twine\Exceptions\ConfigException
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke(int $length, string $padding = ' ', int $mode = Twine\Config\Pad::RIGHT) : Twine\Str
    {
        Twine\Config\Pad::validateOption($mode);

        $diff = strlen($this->string) - mb_strlen($this->string);

        return new Twine\Str(str_pad($this->string, $length + $diff, $padding, $mode));
    }
}
