<?php

namespace Twine;

use Twine\Exceptions\InvalidConfigOptionException;

class Str
{
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
     * @param int $mode Config::CHARS_ARRAY_ALL - an array with the byte-value as key and the frequency of every byte as value.
     *                  Config::CHARS_ARRAY_USED- same as Config::CHARS_ARRAY_ALL but only byte-values with a frequency greater than zero are listed.
     *                  Config::CHARS_ARRAY_NOT_USED - same as Config::CHARS_ARRAY_ALL but only byte-values with a frequency equal to zero are listed.
     *                  Config::CHARS_UNIQUE - a string containing all unique characters is returned.
     *                  Config::CHARS_NOT_USED - a string containing all not used characters is returned.
     *
     * @return array|string
     */
    public function characters($mode = Config::CHARS_ARRAY_USED)
    {
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
     * @param string $type Config::UC_ALL - Uppercase all characters of the string
     *                     Config::UC_FIRST - Uppercase the first character of the string only
     *                     Config::UC_WORDS - Uppercase the first character of each word of the string
     *
     * @return Twine\Str
     */
    public function uppercase($type = Config::UC_ALL)
    {
        if (! in_array($type, [Config::UC_ALL, Config::UC_FIRST, Config::UC_WORDS])) {
            throw new InvalidConfigOptionException('$type must be one of Config::UC_ALL, Config::UC_FIRST, Config::UC_WORDS');
        }

        return new static($type($this->string));
    }

    /**
     * Convert all or parts of the string to lowercase.
     *
     * @param string $type Config::LC_ALL - Lowercase all characters of the string
     *                     Config::LC_FIRST - Lowercase the first character of the string only
     *                     Config::LC_WORDS - Lowercase the first character of each word of the string
     *
     * @return Twine\Str
     */
    public function lowercase($type = Config::LC_ALL)
    {
        if (! in_array($type, [Config::LC_ALL, Config::LC_FIRST, Config::LC_WORDS])) {
            throw new InvalidConfigOptionException('$type must be one of Config::LC_ALL, Config::LC_FIRST, Config::LC_WORDS');
        }

        if ($type == Config::LC_WORDS) {
            $words = array_map(function ($word) {
                return lcfirst($word);
            }, explode(' ', $this->string));

            return new static(implode(' ', $words));
        }

        return new static($type($this->string));
    }

    /**
     * Remove whitespace or a specific set of characters from the beginning
     * and/or end of the string.
     *
     * @param string $mask A list of characters to be stripped (default: Config::TRIM_MASK)
     * @param string $type Config::TRIM_BOTH - Trim characters from the beginning and end of the string
     *                     Config::TRIM_LEFT - Only trim characters from the begining of the string
     *                     Config::TRIM_RIGHT - Only trim characters from the end of the strring
     *
     * @return Twine\Str
     */
    public function trim($mask = Config::TRIM_MASK, $type = Config::TRIM_BOTH)
    {
        if (! in_array($type, [Config::TRIM_BOTH, Config::TRIM_LEFT, Config::TRIM_RIGHT])) {
            throw new InvalidConfigOptionException('$type must be one of Config::TRIM_BOTH, Config::TRIM_LEFT, Config::TRIM_RIGHT');
        }

        return new static($type($this->string, $mask));
    }

    /**
     * Pad the string to a specific length.
     *
     * @param int $length Length to pad the string to
     * @param string $padding Character to pad the string with
     *
     * @return Twine\Str
     */
    public function pad($length, $padding = ' ', $type = Config::PAD_RIGHT)
    {
        return new static(str_pad($this->string, $length, $padding, $type));
    }

    /**
     *  Calculate the crc32 polynomial of the string.
     *
     * @return int The crc32 polynomial of the string
     */
    public function crc32()
    {
        return crc32($this->string);
    }

    /**
     * Hash the string using the standard Unix DES-based algorithm or an
     * alternative algorithm that may be available on the system.
     *
     * @param string $salt A salt string to base the hashing on
     *
     * @return Twine\Str
     */
    public function crypt($salt = null)
    {
        return new static(crypt($this->string, $salt));
    }

    /**
     * Calculate the md5 hash of the string.
     *
     * @param boolean $raw If true, returns the raw binary of the hash
     *
     * @return Twine\Str
     */
    public function md5($raw = false)
    {
        return new static(hash('md5', $this->string, $raw));
    }

    /**
     * Calculate the sha1 hash of the string.
     *
     * @param boolean $raw If true, returns the raw binary of the hash
     *
     * @return Twine\Str
     */
    public function sha1($raw = false)
    {
        return new static(hash('sha1', $this->string, $raw));
    }

    /**
     * Calculate the sha256 hash of the string.
     *
     * @param boolean $raw If true, returns the raw binary of the hash
     *
     * @return Twine\Str
     */
    public function sha256($raw = false)
    {
        return new static(hash('sha256', $this->string, $raw));
    }

    /**
     * Encode the string to or decode from a base64 encoded value.
     *
     * @param string $type Config::BASE64_ENCODE - Encode the string to base64
     *                     Config::BASE65_DECODE - Decode the string from base64
     *
     * @return Twine\Str
     */
    public function base64($type = Config::BASE64_ENCODE)
    {
        if (! in_array($type, [Config::BASE64_ENCODE, Config::BASE64_DECODE])) {
            throw new InvalidConfigOptionException('$type must be one of Config::BASE64_ENCODE, Config::BASE64_DECODE');
        }

        return new static($type($this->string));
    }

    /**
     * Split a string into smaller chunks.
     *
     * @param integer $length Length of a chunk
     *
     * @return Twine\Str
     */
    public function chunk($length = 76)
    {
        return new static(chunk_split($this->string, $length));
    }

    /**
     * Wrap the string to a given number of characters.
     *
     * @param int $width Number of characters at which to wrap
     * @param string $break Character used to break the string
     * @param boolean $cut If true, always wrap at or before the specified width
     *
     * @return Twine\Str
     */
    public function wrap($width, $break = "\n", $cut = false)
    {
        return new static(wordwrap($this->string, $width, $break, $cut));
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
     * Randomly shuffle the string.
     *
     * @return Twine\Str
     */
    public function shuffle()
    {
        return new static(str_shuffle($this->string));
    }

    /**
     * Split the string into an array of characters.
     *
     * @param integer $length Length of each array chunk
     *
     * @return array
     */
    public function split($length = 1)
    {
        return str_split($this->string, $length);
    }

    /**
     * Split a string into an array by another string.
     *
     * @param string $delimiter The boundry string
     * @param int $limit If positive, returned array will contain a maximum of
     *                   $limit elements with the last element containing the rest of string.
     *
     *                   If negative, all components except the last -$limit are returned.
     *
     *                   If zero, then this is treated as 1.
     *
     * @return array
     */
    public function explode($delimiter, $limit = PHP_INT_MAX)
    {
        return explode($delimiter, $this->string, $limit);
    }

    /**
     * Strip HTML and PHP tags from the string.
     *
     * @param  $allowedTags Tags which should not be stripped
     *
     * @return Twine\Str
     */
    public function strip($allowedTags = null)
    {
        return new static(strip_tags($this->string, $allowedTags));
    }

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
        if (! in_array($mode, [Config::FIND_FIRST, Config::FIND_LAST, Config::FIND_FIRST_I, Config::FIND_LAST_I])) {
            throw new InvalidConfigOptionException('$mode must be one of Config::FIND_FIRST, Config::FIND_LAST, Config::FIND_FIRST_I, Config::FIND_LAST_I');
        }

        return $mode($this->string, $needle, $offset);
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
        if (! in_array($mode, [Config::COMPARE_CASE_SENSITIVE, Config::COMPARE_CASE_INSENSITIVE, Config::COMPARE_NATCASE])) {
            throw new InvalidConfigOptionException('$mode must be one of Config::COMPARE_CASE_SENSITIVE, Config::COPMPARE_CASE_INSENSITIVE, Config::COMPARE_NATCASE');
        }

        return $mode($this->string, $string);
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
