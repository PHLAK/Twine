<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class Repeat extends Method
{
    /**
     * Repeat the string multiple times.
     *
     * @param int $multiplier Number of times to repeat the string
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke(int $multiplier, string $glue = '') : Twine\Str
    {
        $strings = array_fill(0, $multiplier, $this->string);

        return new Twine\Str(implode($glue, $strings));
    }
}
