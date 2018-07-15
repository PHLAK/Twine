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

    /**
     * Encode and decode the string to and from hex.
     *
     * @param int $mode A hex mode flag
     *
     * Available hex modes:
     *
     *   - Twine\Config\Hex::ENCODE - Encode the string to hex
     *   - Twine\Config\Hex::DECODE - Decode the string from hex
     *
     * @return self
     */
    public function hex($mode = Config\Hex::ENCODE)
    {
        Config\Hex::validateOption($mode);

        switch ($mode) {
            case Config\Hex::ENCODE:
                $characters = array_map(function ($char) {
                    return '\x' . dechex(ord($char));
                }, str_split($this->string));

                return new static(implode($characters));

            case Config\Hex::DECODE:
                $string = preg_replace_callback('/\\\\x([0-9A-Fa-f]+)/', function ($matched) {
                    return chr(hexdec($matched[1]));
                }, $this->string);

                return new static($string);
        }
    }
}
