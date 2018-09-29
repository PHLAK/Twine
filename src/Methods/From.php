<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class From extends Method
{
    /**
     * Return part of the string starting from another string.
     *
     * @param string $string The string to start from
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke(string $string) : Twine\Str
    {
        return new Twine\Str(mb_strstr($this->string, $string));
    }
}
