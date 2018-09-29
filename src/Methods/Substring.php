<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class Substring extends Method
{
    /**
     * Return part of the string.
     *
     * @param int $start  Starting position of the substring
     * @param int $length Length of substring
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke(int $start, int $length = null) : Twine\Str
    {
        $length = isset($length) ? $length : $this->string->length() - $start;

        return new Twine\Str(mb_substr($this->string, $start, $length));
    }
}
