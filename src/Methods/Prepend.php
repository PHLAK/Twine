<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class Prepend extends Method
{
    /**
     * Prepend one or more strings to the string.
     *
     * @param string ...$strings One or more strings to prepend
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke(string ...$strings) : Twine\Str
    {
        array_push($strings, $this->string);

        return new Twine\Str(implode($strings));
    }
}
