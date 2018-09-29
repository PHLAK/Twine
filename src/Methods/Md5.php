<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class Md5 extends Method
{
    /**
     * Calculate the md5 hash of the string.
     *
     * @param bool $mode A md5 mode flag
     *
     * Available md5 modes:
     *
     *   - Twine\Config\Md5::DEFAULT - Return the hash
     *   - Twine\Config\Md5::RAW - Return the raw binary of the hash
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke(bool $mode = Twine\Config\Md5::DEFAULT) : Twine\Str
    {
        Twine\Config\Md5::validateOption($mode);

        return new Twine\Str(hash('md5', $this->string, $mode));
    }
}
