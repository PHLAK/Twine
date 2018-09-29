<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class Truncate extends Method
{
    /**
     * Truncate a string to a specific length and append a suffix.
     *
     * @param int    $length Length string will be truncated to, including suffix
     * @param string $suffix Suffix to append (default: '...')
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke(int $length, string $suffix = '...') : Twine\Str
    {
        return new Twine\Str(
            $this->string->first($length - mb_strlen($suffix))->trimRight()->append($suffix)
        );
    }
}
