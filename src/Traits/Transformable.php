<?php

namespace PHLAK\Twine\Traits;

use PHLAK\Twine\Config;
use PHLAK\Twine\Support;

trait Transformable
{
    /**
     * Insert some text into the string at a given position.
     *
     * @param string $string   Text to insert
     * @param int    $position Position at which to insert the text
     *
     * @return self
     */
    public function insert(string $string, int $position): self
    {
        return new static(
            mb_substr($this->string, 0, $position, $this->encoding) . $string . mb_substr($this->string, $position, null, $this->encoding),
            $this->encoding
        );
    }

    /**
     * Reverse the string.
     *
     * @return self
     */
    public function reverse(): self
    {
        return new static(
            implode(array_reverse(Support\Str::characters($this->string))),
            $this->encoding
        );
    }

    /**
     * Replace parts of the string with another string.
     *
     * @param string|array $search  One or more strings to be replaced
     * @param string|array $replace One or more strings to replace with
     * @param int          $count   This will be set to the number of replacements performed
     *
     * @return self
     */
    public function replace($search, $replace, int &$count = null): self
    {
        return new static(str_replace($search, $replace, $this->string, $count), $this->encoding);
    }

    /**
     * Randomly shuffle the characters of the string.
     *
     * @return self
     */
    public function shuffle(): self
    {
        $characters = Support\Str::characters($this->string);

        shuffle($characters);

        return new static(implode($characters), $this->encoding);
    }

    /**
     * Repeat the string multiple times.
     *
     * @param int $multiplier Number of times to repeat the string
     *
     * @return self
     */
    public function repeat(int $multiplier, string $glue = ''): self
    {
        $strings = array_fill(0, $multiplier, $this->string);

        return new static(implode($glue, $strings), $this->encoding);
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
     * @throws \PHLAK\Twine\Exceptions\ConfigException
     *
     * @return self
     */
    public function wrap(int $width, string $break = "\n", bool $mode = Config\Wrap::SOFT): self
    {
        Config\Wrap::validateOption($mode);

        return new static(wordwrap($this->string, $width, $break, $mode), $this->encoding);
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
     * @throws \PHLAK\Twine\Exceptions\ConfigException
     *
     * @return self
     */
    public function pad(int $length, string $padding = ' ', int $mode = Config\Pad::RIGHT): self
    {
        Config\Pad::validateOption($mode);

        $diff = strlen($this->string) - mb_strlen($this->string, $this->encoding);

        return new static(str_pad($this->string, $length + $diff, $padding, $mode), $this->encoding);
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
     * @throws \PHLAK\Twine\Exceptions\ConfigException
     *
     * @return self
     */
    public function trim(string $mask = " \t\n\r\0\x0B", string $mode = Config\Trim::BOTH): self
    {
        Config\Trim::validateOption($mode);

        return new static($mode($this->string, $mask), $this->encoding);
    }

    /**
     * Remove one or more strings from the string.
     *
     * @param string|array $search One or more strings to be removed
     *
     * @return self
     */
    public function strip($search)
    {
        return $this->replace($search, '');
    }

    /**
     * Split a string by a string.
     *
     * @param string $delimiter The boundary string
     * @param int    $limit     the maximum number of elements in the exploded array.
     *
     *   - If limit is set and positive, the returned array will contain a maximum of limit elements with the last element containing the rest of string.
     *   - If the limit parameter is negative, all components except the last -limit are returned.
     *   - If the limit parameter is zero, then this is treated as 1
     *
     * @return self[]
     */
    public function explode(string $delimiter, int $limit = PHP_INT_MAX)
    {
        return array_map(function ($string) {
            return new static($string, $this->encoding);
        }, explode($delimiter, $this->string, $limit));
    }
}
