<?php

namespace PHLAK\Twine;

use PHLAK\Twine\Traits\ArrayAccess;
use PHLAK\Twine\Traits\Comparable;
use PHLAK\Twine\Traits\Convinience;
use PHLAK\Twine\Traits\Hashable;
use PHLAK\Twine\Exceptions\InvalidConfigOptionException;

class Str implements \ArrayAccess
{
    use ArrayAccess, Comparable, Convinience, Hashable;

    /** @var string A string */
    protected $string;

    /**
     * Str constructor, runs on object creation.
     *
     * @param string $string A string
     */
    public function __construct($string = '')
    {
        $this->string = $string;
    }

    /**
     * Magic toString method.
     *
     * @return string The string
     */
    public function __toString()
    {
        return $this->string;
    }

    /**
     * Return part of the string.
     *
     * @param int $start  Starting position of the substring
     * @param int $length Length of substring
     *
     * @return Str
     */
    public function substring($start, $length = null)
    {
        $length = isset($length) ? $length : $this->length() - $start;

        return new static(substr($this->string, $start, $length));
    }

    /**
     * Append a suffix to the string.
     *
     * @param string $suffix A suffix to append
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
     * @param string $prefix A prefix to prepend
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
     * @param string $string   Text to be inserted
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
     * @param string $mode Config\Uppercase::ALL - Uppercase all characters of the string (default)
     *                     Config\Uppercase::FIRST - Uppercase the first character of the string only
     *                     Config\Uppercase::WORDS - Uppercase the first character of each word of the string
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
     * @param string $mode Config\Lowercase::ALL - Lowercase all characters of the string (default)
     *                     Config\Lowercase::FIRST - Lowercase the first character of the string only
     *                     Config\Lowercase::WORDS - Lowercase the first character of each word of the string
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

    /**
     * Pad the string to a specific length.
     *
     * @param int    $length  Length to pad the string to
     * @param string $padding Character to pad the string with
     * @param int    $mode    Config::PAD_RIGHT - Only pad the right side of the string
     *                        Config::PAD_LEFT - Only pad the left side of the string
     *                        Config::PAD_BOTH - Pad both sides of the string
     *
     * @return Str
     */
    public function pad($length, $padding = ' ', $mode = Config\Pad::RIGHT)
    {
        Config\Pad::validateOption($mode);

        return new static(str_pad($this->string, $length, $padding, $mode));
    }

    /**
     * Remove whitespace or a specific set of characters from the beginning
     * and/or end of the string.
     *
     * @param string $mask A list of characters to be stripped (default: Config\Trim::MASK)
     * @param string $mode Config\Trim::BOTH - Trim characters from the beginning and end of the string (default)
     *                     Config\Trim::LEFT - Only trim characters from the begining of the string
     *                     Config\Trim::RIGHT - Only trim characters from the end of the strring
     *
     * @return Str
     */
    public function trim($mask = Config\Trim::MASK, $mode = Config\Trim::BOTH)
    {
        Config\Trim::validateOption($mode);

        return new static($mode($this->string, $mask));
    }

    /**
     * Wrap the string to a given number of characters.
     *
     * @param int    $width Number of characters at which to wrap
     * @param string $break Character used to break the string
     * @param bool   $cut   Config\Wrap::SOFT - Wrap at the first whitespace character after the specified width (default)
     *                      Config\Wrap::HARD - Always wrap at or before the specified width
     *
     * @return Str
     */
    public function wrap($width, $break = "\n", $cut = Config\Wrap::SOFT)
    {
        return new static(wordwrap($this->string, $width, $break, $cut));
    }

    /**
     * Return part of the string occuring before a specific character.
     *
     * @param string $character The delimiting character
     *
     * @return Str
     */
    public function before($character)
    {
        return new static(explode($character, $this->string, 2)[0]);
    }

    /**
     * Return part of the string occuring after a specific character.
     *
     * @param string $character The delimiting character
     *
     * @return Str
     */
    public function after($character)
    {
        return new static(explode($character, $this->string, 2)[1]);
    }
}
