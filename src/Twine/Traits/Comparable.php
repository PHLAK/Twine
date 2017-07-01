<?php

namespace Twine\Traits;

use Twine\Config;
use Twine\Exceptions\InvalidConfigOptionException;

// trnatcasecmp, strnatcmp, strncmp, similar_text

trait Comparable
{
    /**
     * Compare the string or a substring of the string with another string.
     *
     * @param string $string A string to compare against
     * @param int $mode Config::COMPARE_CASE_SENSITIVE - Case sensitive comparison
     *                  Config::COMPARE_CASE_INSENSITIVE - Case insensitive comparison
     *
     * @return int Returns < 0 if the offset of the string is less than $string,
     *             > 0 if it is greater than $string, and 0 if they areequal.
     */
    public function compare($string, $mode = Config::COMPARE_CASE_SENSITIVE)
    {
        $compareModes = [
            Config::COMPARE_CASE_SENSITIVE,
            Config::COMPARE_CASE_INSENSITIVE,
            Config::COMPARE_NATCASE
        ];

        if (! in_array($mode, $compareModes, true)) {
            throw new InvalidConfigOptionException('$mode must be one of ' . implode(', ', $compareModes));
        }

        return $mode($this->string, $string);
    }
}
