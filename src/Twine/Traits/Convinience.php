<?php

namespace Twine\Traits;

use Twine\Config;

trait Convinience
{
    /**
     * Get the length of the string.
     *
     * @return int Length of the string
     */
    public function length()
    {
        return strlen($this->string);
    }

    /**
     * Count the number of occurences of a substring in the string.
     *
     * @param string $string Substring to count
     *
     * @return int
     */
    public function count($string)
    {
        return substr_count($this->string, $string);
    }

    /**
     * Determine if the string is equal to another string.
     *
     * @param string $string A string to compare against
     *
     * @return bool
     */
    public function equals($string, $mode = Config::EQ_EXACT)
    {
        return $mode($this->string, $string) === 0;
    }
}
