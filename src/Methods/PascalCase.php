<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class PascalCase extends Method
{
    /**
     * Convert the string to PascalCase.
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke() : Twine\Str
    {
        return $this->string->studlyCase();
    }
}
