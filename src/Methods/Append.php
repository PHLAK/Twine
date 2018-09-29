<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class Append extends Method
{
    /**
     * Append one or more strings to the string.
     *
     * @param string ...$strings One or more strings to append
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke(string ...$strings) : Twine\Str
    {
        array_unshift($strings, $this->string);

        return new Twine\Str(implode($strings));
    }
}
