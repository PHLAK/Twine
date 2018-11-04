<?php

namespace PHLAK\Twine\Traits;

use PHLAK\Twine\Config;
use PHLAK\Twine\Support;
use RuntimeException;

trait Encodable
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
     * @return self
     */
    public function base64(string $mode = Config\Base64::ENCODE) : self
    {
        Config\Base64::validateOption($mode);

        return new static($mode($this->string));
    }

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
     * @return self
     */
    public function url(string $mode = Config\Url::ENCODE) : self
    {
        Config\Url::validateOption($mode);

        return new static($mode($this->string));
    }

    /**
     * Encode and decode the string to and from hex.
     *
     * @param string $mode A hex mode flag
     *
     * Available hex modes:
     *
     *   - Twine\Config\Hex::ENCODE - Encode the string to hex
     *   - Twine\Config\Hex::DECODE - Decode the string from hex
     *
     * @return self
     */
    public function hex(string $mode = Config\Hex::ENCODE) : self
    {
        Config\Hex::validateOption($mode);

        switch ($mode) {
            case Config\Hex::ENCODE:
                $string = array_reduce(Support\Str::characters($this->string), function ($str, $char) {
                    return $str . '\x' . dechex(mb_ord($char, $this->encoding));
                }, '');
                break;

            case Config\Hex::DECODE:
                $string = preg_replace_callback('/\\\\x([0-9A-Fa-f]+)/', function ($matched) {
                    return mb_chr(hexdec($matched[1]), $this->encoding);
                }, $this->string);
                break;

            default:
                throw new RuntimeException('Invalid mode');
        }

        return new static($string);
    }
}
