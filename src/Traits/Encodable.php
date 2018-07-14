<?php

namespace PHLAK\Twine\Traits;

use PHLAK\Twine\Config;

trait Encodable
{
    /**
     * Encode the string to or decode from a base64 encoded value.
     *
     * @param string $mode Config\Base64::ENCODE - Encode the string to base64
     *                     Config\Base64::DECODE - Decode the string from base64
     *
     * @throws \PHLAK\Twine\Exceptions\InvalidConfigOptionException
     *
     * @return self
     */
    public function base64($mode = Config\Base64::ENCODE)
    {
        Config\Base64::validateOption($mode);

        return new static($mode($this->string));
    }

    /**
     * Encode the string to a URL safe string.
     *
     * @return self
     */
    public function urlencode()
    {
        return new static(urlencode($this->string));
    }
}
