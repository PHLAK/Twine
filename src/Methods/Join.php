<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class Join extends Method
{
    /**
     * Join two strings with another string in between.
     *
     * @param string $string The string to be joined
     * @param string $glue   A string to use as the glue
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke(string $string, string $glue = ' ') : Twine\Str
    {
        return new Twine\Str($this->string . $glue . $string);
    }
}
