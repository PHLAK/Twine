<?php

namespace PHLAK\Twine\Traits;

use PHLAK\Twine\Config;

trait Aliases
{
    /**
     * Encode the string to base64.
     *
     * @return self
     */
    public function base64Encode()
    {
        return $this->base64(Config\Base64::ENCODE);
    }

    /**
     * Decode the base64 encoded string.
     *
     * @return self
     */
    public function base64Decode()
    {
        return $this->base64(Config\Base64::DECODE);
    }

    /**
     * Remove whitespace or a specific set of characters from the beginning of
     * the string.
     *
     * @param string $mask A list of characters to be stripped (default: " \t\n\r\0\x0B")
     *
     * @return self
     */
    public function trimLeft($mask = " \t\n\r\0\x0B")
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
    public function trimRight($mask = " \t\n\r\0\x0B")
    {
        return $this->trim($mask, Config\Trim::RIGHT);
    }

    /**
     * Convert the first character of the string to uppercase.
     *
     * @return self
     */
    public function uppercaseFirst()
    {
        return $this->uppercase(Config\Uppercase::FIRST);
    }

    /**
     * Convert the first character of each word in the string to uppercase.
     *
     * @return self
     */
    public function uppercaseWords()
    {
        return $this->uppercase(Config\Uppercase::WORDS);
    }

    /**
     * Convert the first letter of the string to lowercase.
     *
     * @return self
     */
    public function lowercaseFirst()
    {
        return $this->lowercase(Config\Lowercase::FIRST);
    }

    /**
     * Convert the first letter of the string to lowercase.
     *
     * @return self
     */
    public function lowercaseWords()
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
    public function wrapSoft($width, $break = "\n")
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
    public function wrapHard($width, $break = "\n")
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
    public function padRight($length, $padding = ' ')
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
    public function padLeft($length, $padding = ' ')
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
    public function padBoth($length, $padding = ' ')
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
    public function insensitiveMatch($string)
    {
        $this->equals($string, Config\Equals::CASE_INSENSITIVE);
    }
}
