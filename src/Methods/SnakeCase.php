<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class SnakeCase extends Method
{
    /**
     * Convert the string to snake_case.
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke() : Twine\Str
    {
        $words = array_map(function ($word) {
            return mb_strtolower($word);
        }, $this->string->words());

        return new Twine\Str(implode('_', $words));
    }
}
