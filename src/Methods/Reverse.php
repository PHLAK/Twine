<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class Reverse extends Method
{
    /**
     * Reverse the string.
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke() : Twine\Str
    {
        $length = mb_strlen($this->string);
        $reversed = '';

        while ($length-- > 0) {
            $reversed .= mb_substr($this->string, $length, 1) ?? '';
        }

        return new Twine\Str($reversed);
    }
}
