<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class Replace extends Method
{
    /**
     * Replace parts of the string with another string.
     *
     * @param string|array $search  One or more strings to be replaced
     * @param string|array $replace One or more strings to replace with
     * @param int          $count   This will be set to the number of replacements performed
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke($search, $replace, int &$count = null) : Twine\Str
    {
        return new Twine\Str(str_replace($search, $replace, $this->string, $count));
    }
}
