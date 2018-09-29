<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class Format extends Method
{
    /**
     * Return the formatted string.
     *
     * @param mixed ...$args Any number of elements to fill the string
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke(...$args) : Twine\Str
    {
        return new Twine\Str(sprintf($this->string, ...$args));
    }
}
