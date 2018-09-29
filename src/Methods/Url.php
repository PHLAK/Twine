<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class Url extends Method
{
    /**
     * Encode the string to or decode it from a URL safe string.
     *
     * Available url modes:
     *
     *   - Twine\Config\Url::ENCODE - Encode the string to a URL safe string
     *   - Twine\Config\Url::DECODE - Decode the string from a URL safe string
     *
     * @param string $mode A url mode flag
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke(string $mode = Twine\Config\Url::ENCODE) : Twine\Str
    {
        Twine\Config\Url::validateOption($mode);

        return new Twine\Str($mode($this->string));
    }
}
