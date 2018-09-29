<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class Before extends Method
{
    /**
     * Return part of the string occurring before a specific string.
     *
     * @param string $string The delimiting string
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke(string $string) : Twine\Str
    {
        return new Twine\Str(mb_split($string, $this->string, 2)[0]);
    }
}
