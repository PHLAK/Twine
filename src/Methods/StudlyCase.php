<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class StudlyCase extends Method
{
    /**
     * Convert the string to StudlyCase.
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke() : Twine\Str
    {
        $words = array_map(function ($word) {
            return ucfirst(mb_strtolower($word));
        }, $this->string->words());

        return new Twine\Str(implode('', $words));
    }
}
