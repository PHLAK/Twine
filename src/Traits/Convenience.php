<?php

namespace PHLAK\Twine\Traits;

use PHLAK\Twine\Config;

trait Convenience
{
    /**
     * Count the number of occurrences of a substring in the string.
     *
     * @param string $string The substring to count
     *
     * @return int
     */
    public function count(string $string) : int
    {
        return mb_substr_count($this->string, $string);
    }

    /**
     * Echo the string.
     *
     * @return self
     */
    public function echo() : self
    {
        echo $this->string;

        return $this;
    }

    /**
     * Return the formatted string.
     *
     * @param mixed ...$args Any number of elements to fill the string
     *
     * @return self
     */
    public function format(...$args) : self
    {
        return new static(sprintf($this->string, ...$args));
    }

    /**
     * Get the length of the string.
     *
     * @return int Length of the string
     */
    public function length() : int
    {
        return mb_strlen($this->string);
    }

    /**
     * Split the string into an array of words.
     *
     * @return \PHLAK\Twine\Str[]
     */
    public function words() : array
    {
        preg_match_all('/[A-Z]?[a-z0-9]+/', $this->string, $matches);

        return array_map(function ($words) {
            return new static($words);
        }, $matches[0]);
    }

    /**
     * Split the string into an array of characters.
     *
     * @return \PHLAK\Twine\Str[]
     */
    public function characters($mode = Config\Characters::ALL) : array
    {
        Config\Characters::validateOption($mode);

        $characters = preg_split('//u', $this->string, -1, PREG_SPLIT_NO_EMPTY);

        if ($mode === Config\Characters::UNIQUE) {
            $characters = array_values(array_unique($characters));
        }

        return array_map(function ($character) {
            return new static($character);
        }, $characters);
    }

    /**
     * Determine if the string is empty.
     *
     * @return bool
     */
    public function isEmpty() : bool
    {
        return empty($this->string);
    }

    /**
     * Determine if the string is not empty.
     *
     * @return bool
     */
    public function isNotEmpty() : bool
    {
        return ! empty($this->string);
    }
}
