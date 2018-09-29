<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class Base64 extends Method
{
    /**
     * Encode the string to or decode from a base64 encoded value.
     *
     * @param string $mode A base64 mode flag
     *
     * Available base64 modes:
     *
     *   - Twine\Config\Base64::ENCODE - Encode the string to base64
     *   - Twin\Config\Base64::DECODE - Decode the string from base64
     *
     * @throws \PHLAK\Twine\Exceptions\ConfigException
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke(string $mode = Twine\Config\Base64::ENCODE) : Twine\Str
    {
        Twine\Config\Base64::validateOption($mode);

        return new Twine\Str($mode($this->string));
    }
}
