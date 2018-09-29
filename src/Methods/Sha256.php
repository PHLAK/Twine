<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class Sha256 extends Method
{
    /**
     * Calculate the sha256 hash of the string.
     *
     * @param bool $mode A sha256 mode flag
     *
     *  Available sha256 modes:
     *
     *   - Twine\Config\Sha256::DEFAULT - Return the hash
     *   - Twine\Config\Sha256::RAW - Return the raw binary of the hash
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke(bool $mode = Twine\Config\Sha256::DEFAULT) : Twine\Str
    {
        Twine\Config\Sha256::validateOption($mode);

        return new Twine\Str(hash('sha256', $this->string, $mode));
    }
}
