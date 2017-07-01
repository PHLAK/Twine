<?php

namespace Twine\Traits;

use Twine\Config;
use Twine\Exceptions\InvalidConfigOptionException;

// TODO: chr, strpbrk, strrchr, strstr, stristr, substr_count

trait Searchable
{
    /**
     * Find the position of an occurrence of a substring in the string.
     *
     * @param mixed $needle The substring to find. If not a string, needle is
     *                      converted to an integer and used as the ordinal
     *                      value of a character.
     * @param integer $offset Number of characters from the beginning of the
     *                        string to start searching from.
     * @param string $mode Config::FIND_FIRST - Find the first occurance of the needle
     *                     Config::FIND_LAST - Find the last occurance of the needle
     *                     Config::FIND_FIRST_I - Like Config::FIND_FIRST but case insensitive
     *                     Config::FIND_LAST_I - Like Config::FIND_LAST but case insensitive
     *
     * @return int
     */
    public function find($needle, $offset = 0, $mode = Config::FIND_FIRST)
    {
        $findModes = [
            Config::FIND_FIRST,
            Config::FIND_LAST,
            Config::FIND_FIRST_I,
            Config::FIND_LAST_I
        ];

        if (! in_array($mode, $findModes, true)) {
            throw new InvalidConfigOptionException('$mode must be one of ' . implode(', ', $findModes));
        }

        return $mode($this->string, $needle, $offset);
    }
}
