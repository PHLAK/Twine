<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class CamelCase extends Method
{
    /**
     * Convert the string to camelCase.
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke() : Twine\Str
    {
        $words = array_map(function ($word) {
            return ucfirst(mb_strtolower($word));
        }, $this->string->words());

        return new Twine\Str(lcfirst(implode('', $words)));
    }
}
