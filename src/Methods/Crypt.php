<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class Crypt extends Method
{
    /**
     * Hash the string using the standard Unix DES-based algorithm or an
     * alternative algorithm that may be available on the system.
     *
     * @param string $salt A salt string to base the hashing on
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke(string $salt) : Twine\Str
    {
        return new Twine\Str(crypt($this->string, $salt));
    }
}
