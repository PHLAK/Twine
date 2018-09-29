<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class Bcrypt extends Method
{
    /**
     * Creates a hash from the string using the CRYPT_BLOWFISH algorithm.
     *
     * @param array $options An array of bcrypt hasing options
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke(array $options = []) : Twine\Str
    {
        return new Twine\Str(password_hash($this->string, PASSWORD_BCRYPT, $options));
    }
}
