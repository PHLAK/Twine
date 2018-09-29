<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class KebabCase extends Method
{
    /**
     * Convert the string to kebab-case.
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke() : Twine\Str
    {
        $words = array_map(function ($word) {
            return mb_strtolower($word);
        }, $this->string->words());

        return new Twine\Str(implode('-', $words));
    }
}
