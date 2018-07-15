<?php

namespace PHLAK\Twine\Traits;

use PHLAK\Twine\Config;

trait Aliases
{
    /**
     * Return a number of characters from the start of the string.
     *
     * @param int $count The number of characters to be returned
     *
     * @return self
     */
    public function first($count) : self
    {
        return $this->substring(0, $count);
    }

    /**
     * Return a number of characters from the end of the string.
     *
     * @param int $count The number of characters to be returned
     *
     * @return self
     */
    public function last($count) : self
    {
        return $this->substring(-$count);
    }

    /**
     * Encode the string to base64.
     *
     * @return self
     */
    public function base64Encode() : self
    {
        return $this->base64(Config\Base64::ENCODE);
    }

    /**
     * Decode the base64 encoded string.
     *
     * @return self
     */
    public function base64Decode() : self
    {
        return $this->base64(Config\Base64::DECODE);
    }

    /**
     * Encode the string to hex.
     *
     * @return self
     */
    public function hexEncode() : self
    {
        return $this->hex(Config\Hex::ENCODE);
    }

    /**
     * Decode the hex encoded string.
     *
     * @return self
     */
    public function hexDecode() : self
    {
        return $this->hex(Config\Hex::DECODE);
    }

    /**
     * Remove whitespace or a specific set of characters from the beginning of
     * the string.
     *
     * @param string $mask A list of characters to be stripped (default: " \t\n\r\0\x0B")
     *
     * @return self
     */
    public function trimLeft($mask = " \t\n\r\0\x0B") : self
    {
        return $this->trim($mask, Config\Trim::LEFT);
    }

    /**
     * Remove whitespace or a specific set of characters from the end of the string.
     *
     * @param string $mask A list of characters to be stripped (default: " \t\n\r\0\x0B")
     *
     * @return self
     */
    public function trimRight($mask = " \t\n\r\0\x0B") : self
    {
        return $this->trim($mask, Config\Trim::RIGHT);
    }

    /**
     * Convert the first character of the string to uppercase.
     *
     * @return self
     */
    public function uppercaseFirst() : self
    {
        return $this->uppercase(Config\Uppercase::FIRST);
    }

    /**
     * Convert the first character of each word in the string to uppercase.
     *
     * @return self
     */
    public function uppercaseWords() : self
    {
        return $this->uppercase(Config\Uppercase::WORDS);
    }

    /**
     * Convert the first letter of the string to lowercase.
     *
     * @return self
     */
    public function lowercaseFirst() : self
    {
        return $this->lowercase(Config\Lowercase::FIRST);
    }

    /**
     * Convert the first letter of the string to lowercase.
     *
     * @return self
     */
    public function lowercaseWords() : self
    {
        return $this->lowercase(Config\Lowercase::WORDS);
    }

    /**
     * Wrap the string after the first whitespace character after a given number
     * of characters.
     *
     * @param int    $width Number of characters at which to wrap
     * @param string $break Character used to break the string
     *
     * @return self
     */
    public function wrapSoft($width, $break = "\n") : self
    {
        return $this->wrap($width, $break, Config\Wrap::SOFT);
    }

    /**
     * Wrap the string after an exact number of characters.
     *
     * @param int    $width Number of characters at which to wrap
     * @param string $break Character used to break the string
     *
     * @return self
     */
    public function wrapHard($width, $break = "\n") : self
    {
        return $this->wrap($width, $break, Config\Wrap::HARD);
    }

    /**
     * Pad right side of the string to a specific length.
     *
     * @param int    $length  Length to pad the string to
     * @param string $padding Character to pad the string with
     *
     * @return self
     */
    public function padRight($length, $padding = ' ') : self
    {
        return $this->pad($length, $padding, Config\Pad::RIGHT);
    }

    /**
     * Pad left side of the string to a specific length.
     *
     * @param int    $length  Length to pad the string to
     * @param string $padding Character to pad the string with
     *
     * @return self
     */
    public function padLeft($length, $padding = ' ') : self
    {
        return $this->pad($length, $padding, Config\Pad::LEFT);
    }

    /**
     * Pad both sides of the string to a specific length.
     *
     * @param int    $length  Length to pad the string to
     * @param string $padding Character to pad the string with
     *
     * @return self
     */
    public function padBoth($length, $padding = ' ') : self
    {
        return $this->pad($length, $padding, Config\Pad::BOTH);
    }

    /**
     * Determine if the string matches another string regardless of case.
     *
     * @param string $string The string to compare against
     *
     * @return bool
     */
    public function insensitiveMatch($string) : bool
    {
        return $this->equals($string, Config\Equals::CASE_INSENSITIVE);
    }
}
