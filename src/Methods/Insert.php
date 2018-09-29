<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class Insert extends Method
{
    /**
     * Insert some text into the string at a given position.
     *
     * @param string $string   Text to insert
     * @param int    $position Position at which to insert the text
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke(string $string, int $position) : Twine\Str
    {
        return new Twine\Str(
            mb_substr($this->string, 0, $position) . $string . mb_substr($this->string, $position)
        );
    }
}
