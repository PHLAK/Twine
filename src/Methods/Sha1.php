<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class Sha1 extends Method
{
    /**
     * Calculate the sha1 hash of the string.
     *
     * @param bool $mode A sha1 mode flag
     *
     *  Available sha1 modes:
     *
     *   - Twine\Config\Sha1::DEFAULT - Return the hash
     *   - Twine\Config\Sha1::RAW - Return the raw binary of the hash
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke(bool $mode = Twine\Config\Md5::DEFAULT) : Twine\Str
    {
        Twine\Config\Md5::validateOption($mode);

        return new Twine\Str(hash('sha1', $this->string, $mode));
    }
}
