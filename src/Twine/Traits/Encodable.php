<?php

namespace Twine\Traits;

use Twine\Config;
use Twine\Exceptions\InvalidConfigOptionException;

trait Encodable
{
    /**
     * Encode the string to or decode from a base64 encoded value.
     *
     * @param string $mode Config::BASE64_ENCODE - Encode the string to base64
     *                     Config::BASE64_DECODE - Decode the string from base64
     *
     * @return Twine\Str
     */
    public function base64($mode = Config::BASE64_ENCODE)
    {
        $base64Types = [Config::BASE64_ENCODE, Config::BASE64_DECODE];

        if (! in_array($mode, $base64Types, true)) {
            throw new InvalidConfigOptionException('$mode must be one of ' . implode(', ', $base64Types));
        }

        return new static($mode($this->string));
    }
}
