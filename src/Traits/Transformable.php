<?php

namespace PHLAK\Twine\Traits;

use PHLAK\Twine\Config;

trait Transformable
{
    /**
     * Append a suffix to the string.
     *
     * @param string $suffix A string to append
     *
     * @return Str
     */
    public function append($suffix)
    {
        return new static($this->string . $suffix);
    }

    /**
     * Prepend the string with a prefix.
     *
     * @param string $prefix A string to prepend
     *
     * @return Str
     */
    public function prepend($prefix)
    {
        return new static($prefix . $this->string);
    }

    /**
     * Insert some text into the string at a given position.
     *
     * @param string $string   Text to insert
     * @param int    $position Position at which to insert the text
     *
     * @return Str
     */
    public function insert($string, $position)
    {
        return new static(substr_replace($this->string, $string, $position, 0));
    }

    /**
     * Convert all or parts of the string to uppercase.
     *
     * @param string $mode An uppercase mode flag
     *
     * Available mode flags:
     *
     *   - Twine\Config\Uppercase::ALL - Uppercase all characters of the string (default)
     *   - Twine\Config\Uppercase::FIRST - Uppercase the first character of the string only
     *   - Twine\Config\Uppercase::WORDS - Uppercase the first character of each word of the string
     *
     * @throws \PHLAK\Twine\Exceptions\InvalidConfigOptionException
     *
     * @return Str
     */
    public function uppercase($mode = Config\Uppercase::ALL)
    {
        Config\Uppercase::validateOption($mode);

        return new static($mode($this->string));
    }

    /**
     * Convert all or parts of the string to lowercase.
     *
     * @param string $mode A lowercase mode flag
     *
     * Available mode flags:
     *
     *   - Twine\Config\Lowercase::ALL - Lowercase all characters of the string (default)
     *   - Twine\Config\Lowercase::FIRST - Lowercase the first character of the string only
     *   - Twine\Config\Lowercase::WORDS - Lowercase the first character of each word of the string
     *
     * @throws \PHLAK\Twine\Exceptions\InvalidConfigOptionException
     *
     * @return Str
     */
    public function lowercase($mode = Config\Lowercase::ALL)
    {
        Config\Lowercase::validateOption($mode);

        if ($mode == Config\Lowercase::WORDS) {
            $words = array_map(function ($word) {
                return lcfirst($word);
            }, explode(' ', $this->string));

            return new static(implode(' ', $words));
        }

        return new static($mode($this->string));
    }

    /**
     * Reverse the string.
     *
     * @return Str
     */
    public function reverse()
    {
        return new static(strrev($this->string));
    }

    /**
     * Replace parts of the string with another string.
     *
     * @param string $search  The value to be replaced
     * @param string $replace The value to replace with
     * @param int    &$count  This will be set to the number of replacements performed
     *
     * @return Str
     */
    public function replace($search, $replace, &$count = null)
    {
        return new static(str_replace($search, $replace, $this->string, $count));
    }

    /**
     * Randomly shuffle the characters of the string.
     *
     * @return Str
     */
    public function shuffle()
    {
        return new static(str_shuffle($this->string));
    }

    /*
     * Repeat the string multiple times.
     *
     * @param int $multiplier Number of times to repeat the string
     *
     * @return Str
     */
    public function repeat($multiplier)
    {
        return new static(str_repeat($this->string, $multiplier));
    }

    /**
     * Wrap the string to a given number of characters.
     *
     * @param int    $width Number of characters at which to wrap
     * @param string $break Character used to break the string
     * @param bool   $mode  A wrap mode flag
     *
     * Available wrap modes:
     *
     *   - Twine\Config\Wrap::SOFT - Wrap at the first whitespace character after the specified width (default)
     *   - Twine\Config\Wrap::HARD - Always wrap at or before the specified width
     *
     * @throws \PHLAK\Twine\Exceptions\InvalidConfigOptionException
     *
     * @return Str
     */
    public function wrap($width, $break = "\n", $mode = Config\Wrap::SOFT)
    {
        Config\Wrap::validateOption($mode);

        return new static(wordwrap($this->string, $width, $break, $mode));
    }

    /**
     * Pad the string to a specific length.
     *
     * @param int    $length  Length to pad the string to
     * @param string $padding Character to pad the string with
     * @param int    $mode    A pad mode flag
     *
     * Available mode flags:
     *
     *   - Twine\Config\Pad::RIGHT - Only pad the right side of the string (default)
     *   - Twine\Config\Pad::LEFT - Only pad the left side of the string
     *   - Twine\Config\Pad::BOTH - Pad both sides of the string
     *
     * @throws \PHLAK\Twine\Exceptions\InvalidConfigOptionException
     *
     * @return Str
     */
    public function pad($length, $padding = ' ', $mode = Config\Pad::RIGHT)
    {
        Config\Pad::validateOption($mode);

        return new static(str_pad($this->string, $length, $padding, $mode));
    }

    /**
     * Remove white space or a specific set of characters from the beginning
     * and/or end of the string.
     *
     * @param string $mask A list of characters to be stripped (default: " \t\n\r\0\x0B")
     * @param string $mode A trim mode flag
     *
     * Available trim modes:
     *
     *   - Twine\Config\Trim::BOTH - Trim characters from the beginning and end of the string (default)
     *   - Twine\Config\Trim::LEFT - Only trim characters from the begining of the string
     *   - Twine\Config\Trim::RIGHT - Only trim characters from the end of the strring
     *
     * @throws \PHLAK\Twine\Exceptions\InvalidConfigOptionException
     *
     * @return Str
     */
    public function trim($mask = " \t\n\r\0\x0B", $mode = Config\Trim::BOTH)
    {
        Config\Trim::validateOption($mode);

        return new static($mode($this->string, $mask));
    }
}
