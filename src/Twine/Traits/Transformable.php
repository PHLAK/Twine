<?php

namespace Twine\Traits;

use Twine\Config;
use Twine\Exceptions\InvalidConfigOptionException;

trait Transformable
{
    /**
     * Append a suffix to the string.
     *
     * @param string $suffix A suffix to append
     *
     * @return Twine\Str
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
     * @return Twine\Str
     */
    public function prepend($prefix)
    {
        return new static($prefix . $this->string);
    }

    /**
     * Reverse the string.
     *
     * @return Twine\Str
     */
    public function reverse()
    {
        return new static(strrev($this->string));
    }

    /**
     * Convert all or parts of the string to uppercase.
     *
     * @param string $mode Config::UC_ALL - Uppercase all characters of the string
     *                     Config::UC_FIRST - Uppercase the first character of the string only
     *                     Config::UC_WORDS - Uppercase the first character of each word of the string
     *
     * @return Twine\Str
     */
    public function uppercase($mode = Config::UC_ALL)
    {
        $uppercaseModes = [Config::UC_ALL, Config::UC_FIRST, Config::UC_WORDS];

        if (! in_array($mode, $uppercaseModes, true)) {
            throw new InvalidConfigOptionException('$mode must be one of ' . implode(', ', $uppercaseModes));
        }

        return new static($mode($this->string));
    }

    /**
     * Convert all or parts of the string to lowercase.
     *
     * @param string $mode Config::LC_ALL - Lowercase all characters of the string
     *                     Config::LC_FIRST - Lowercase the first character of the string only
     *                     Config::LC_WORDS - Lowercase the first character of each word of the string
     *
     * @return Twine\Str
     */
    public function lowercase($mode = Config::LC_ALL)
    {
        $lowercaseModes = [Config::LC_ALL, Config::LC_FIRST, Config::LC_WORDS];

        if (! in_array($mode, $lowercaseModes, true)) {
            throw new InvalidConfigOptionException('$mode must be one of ' . implode(', ', $lowercaseModes));
        }

        if ($mode == Config::LC_WORDS) {
            $words = array_map(function ($word) {
                return lcfirst($word);
            }, explode(' ', $this->string));

            return new static(implode(' ', $words));
        }

        return new static($mode($this->string));
    }

    /**
     * Randomly shuffle the string.
     *
     * @return Twine\Str
     */
    public function shuffle()
    {
        return new static(str_shuffle($this->string));
    }

    /**
     * Remove whitespace or a specific set of characters from the beginning
     * and/or end of the string.
     *
     * @param string $mask A list of characters to be stripped (default: Config::TRIM_MASK)
     * @param string $mode Config::TRIM_BOTH - Trim characters from the beginning and end of the string
     *                     Config::TRIM_LEFT - Only trim characters from the begining of the string
     *                     Config::TRIM_RIGHT - Only trim characters from the end of the strring
     *
     * @return Twine\Str
     */
    public function trim($mask = Config::TRIM_MASK, $mode = Config::TRIM_BOTH)
    {
        $trimModes = [Config::TRIM_BOTH, Config::TRIM_LEFT, Config::TRIM_RIGHT];

        if (! in_array($mode, $trimModes, true)) {
            throw new InvalidConfigOptionException('$mode must be one of ' . implode(', ', $trimModes));
        }

        return new static($mode($this->string, $mask));
    }

    /**
     * Pad the string to a specific length.
     *
     * @param int $length Length to pad the string to
     * @param string $padding Character to pad the string with
     * @param int $mode Config::PAD_RIGHT
     *                  Config::PAD_LEFT
     *                  Config::PAD_BOTH
     *
     * @return Twine\Str
     */
    public function pad($length, $padding = ' ', $mode = Config::PAD_RIGHT)
    {
        $padModes = [
            Config::PAD_RIGHT,
            Config::PAD_LEFT,
            Config::PAD_BOTH
        ];

        if (! in_array($mode, $padModes, true)) {
            throw new InvalidConfigOptionException('$mode must be one of ' . implode(', ', $padModes));
        }

        return new static(str_pad($this->string, $length, $padding, $mode));
    }

    /**
     * Insert a string into the string at a given position.
     *
     * @param string $string The string to be inserted
     * @param int $position Position at which to insert $string
     *
     * @return Twine\Str
     */
    public function insert($string, $position)
    {
        return new static(substr_replace($this->string, $string, $position, 0));
    }
}
