<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class Strip extends Method
{
    /**
     * Remove one or more strings from the string.
     *
     * @param string|array $search One or more strings to be removed
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke($search) : Twine\Str
    {
        return $this->string->replace($search, '');
    }
}
