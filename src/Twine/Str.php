<?php

namespace Twine;

use Twine\Exceptions\InvalidConfigOptionException;

use Twine\Traits\Arrayable;
use Twine\Traits\Comparable;
use Twine\Traits\Encodable;
use Twine\Traits\Hashable;
use Twine\Traits\Sanitizable;
use Twine\Traits\Searchable;
use Twine\Traits\Transformable;
use Twine\Traits\Wrappable;

class Str
{
    use Arrayable, Comparable, Encodable, Hashable, Sanitizable,
        Searchable, Transformable, Wrappable;

    /** @var string A string */
    protected $string;

    /**
     * Str constructor, runs on object creation.
     *
     * @param string $string A string
     */
    public function __construct($string = null)
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
     * @param int $start Starting position of the substring
     * @param int $length Length of substring
     *
     * @return Twine\Str
     */
    public function substring($start, $length = null)
    {
        $length = $length ?? $this->length() - $start;

        return new static(substr($this->string, $start, $length));
    }

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
     * Get information about characters used in the string
     *
     * @param int $mode Config::CHARS_ARRAY_ALL - an array with the byte-value
     *                  as key and the frequency of every byte as value.
     *
     *                  Config::CHARS_ARRAY_USED - same as Config::CHARS_ARRAY_ALL
     *                  but only byte-values with a frequency greater than zero
     *                  are listed.
     *
     *                  Config::CHARS_ARRAY_NOT_USED - same as Config::CHARS_ARRAY_ALL
     *                  but only byte-values with a frequency equal to zero are listed.
     *
     *                  Config::CHARS_UNIQUE - a string containing all unique
     *                  characters is returned.
     *
     *                  Config::CHARS_NOT_USED - a string containing all not
     *                  used characters is returned.
     *
     * @return array|string
     */
    public function characters($mode = Config::CHARS_ARRAY_USED)
    {
        $charModes = [
            Config::CHARS_ARRAY_ALL,
            Config::CHARS_ARRAY_USED,
            Config::CHARS_ARRAY_NOT_USED,
            Config::CHARS_UNIQUE,
            Config::CHARS_NOT_USED
        ];

        if (! in_array($mode, $charModes, true)) {
            throw new InvalidConfigOptionException('$mode must be one of ' . implode(', ', $charModes));
        }

        return count_chars($this->string, $mode);
    }

    /**
     * Get information about words used in the string.
     *
     * @param int $format One of Config::WORD_COUNT, Config::WORD_ARRAY, Config::WORD_POSITIONS
     * @param string $charList A list of additional characters to be considered words
     *
     * @return int|array
     */
    public function words($format = Config::WORD_COUNT, $charList = null)
    {
        return str_word_count($this->string, $format, $charList);
    }

    /**
     * Repeat the string.
     *
     * @param int $multiplier Number of times to repeat the string
     *
     * @return Twine\Str
     */
    public function repeat($multiplier)
    {
        return new static(str_repeat($this->string, $multiplier));
    }

    /**
     * Replace parts of the string with another string.
     *
     * @param string $search The value to be replaced
     * @param string $replace The value to replace with
     * @param int &$count This will be set to the number of replacements performed
     *
     * @return Twine\Str
     */
    public function replace($search, $replace, &$count = null)
    {
        return new static(str_replace($search, $replace, $this->string, $count));
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
}
