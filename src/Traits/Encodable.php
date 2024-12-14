<?php

namespace PHLAK\Twine\Traits;

use PHLAK\Twine\Config;
use PHLAK\Twine\Support;

trait Encodable
{
    /**
     * Encode the string to or decode from a base64 encoded value.
     *
     * @param Config\Base64 $mode A base64 mode flag
     *
     * Available base64 modes:
     *
     *   - Twine\Config\Base64::ENCODE - Encode the string to base64
     *   - Twin\Config\Base64::DECODE - Decode the string from base64
     */
    public function base64(Config\Base64 $mode = Config\Base64::ENCODE): self
    {
        return new self(match ($mode) {
            Config\Base64::ENCODE => base64_encode($this->string),
            Config\Base64::DECODE => base64_decode($this->string),
        }, $this->encoding);
    }

    /**
     * Encode the string to or decode it from a URL safe string.
     *
     * @param Config\Url $mode A url mode flag

     * Available url modes:
     *
     *   - Twine\Config\Url::ENCODE - Encode the string to a URL safe string
     *   - Twine\Config\Url::DECODE - Decode the string from a URL safe string
     */
    public function url(Config\Url $mode = Config\Url::ENCODE): self
    {
        return match ($mode) {
            Config\Url::ENCODE => new self(urlencode($this->string), $this->encoding),
            Config\Url::DECODE => new self(urldecode($this->string), $this->encoding),
        };
    }

    /**
     * Encode and decode the string to and from hex.
     *
     * @param Config\Hex $mode A hex mode flag
     *
     * Available hex modes:
     *
     *   - Twine\Config\Hex::ENCODE - Encode the string to hex
     *   - Twine\Config\Hex::DECODE - Decode the string from hex
     */
    public function hex(Config\Hex $mode = Config\Hex::ENCODE): self
    {
        $string = match ($mode) {
            Config\Hex::ENCODE => array_reduce(Support\Str::characters($this->string), function (string $str, string $char) {
                return $str . '\x' . dechex((int) mb_ord($char, $this->encoding));
            }, ''),
            Config\Hex::DECODE => preg_replace_callback('/\\\\x([0-9A-Fa-f]+)/', function (array $matched) {
                return (string) mb_chr((int) hexdec($matched[1]), $this->encoding);
            }, $this->string),
        };

        return new self($string, $this->encoding);
    }
}
