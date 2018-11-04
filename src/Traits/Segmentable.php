<?php

namespace PHLAK\Twine\Traits;

trait Segmentable
{
    /**
     * Return part of the string.
     *
     * @param int $start  Starting position of the substring
     * @param int $length Length of substring
     *
     * @return self
     */
    public function substring(int $start, int $length = null) : self
    {
        $length = isset($length) ? $length : $this->length() - $start;

        return new static(mb_substr($this->string, $start, $length, $this->encoding));
    }

    /**
     * Return part of the string occurring before a specific string.
     *
     * @param string $string The delimiting string
     *
     * @return self
     */
    public function before(string $string) : self
    {
        return new static(mb_split($string, $this->string, 2)[0]);
    }

    /**
     * Return part of the string occurring after a specific string.
     *
     * @param string $string The delimiting string
     *
     * @return self
     */
    public function after(string $string) : self
    {
        return new static(mb_split($string, $this->string, 2)[1]);
    }

    /**
     * Return part of the string starting from the first occurance of another string.
     *
     * @param string $string The string to start from
     *
     * @return self
     */
    public function from(string $string) : self
    {
        return new static(mb_strstr($this->string, $string, null, $this->encoding));
    }

    /**
     * Return part of the string up to and including the first occurance of another string.
     *
     * @param string $string The string to end with
     *
     * @return self
     */
    public function to(string $string) : self
    {
        $substring = mb_strstr($this->string, $string, true, $this->encoding);

        return new static($substring ? $substring . $string : null);
    }

    /**
     * Truncate a string to a specific length and append a suffix.
     *
     * @param int    $length Length string will be truncated to, including suffix
     * @param string $suffix Suffix to append (default: '...')
     *
     * @return self
     */
    public function truncate(int $length, string $suffix = '...') : self
    {
        return new static(
            $this->first($length - mb_strlen($suffix, $this->encoding))->trimRight()->append($suffix)
        );
    }

    /**
     * Spit the string into an array of chunks of a given length.
     *
     * @param int $length The desired chunk length
     *
     * @return \PHLAK\Twine\Str[]
     */
    public function chunk(int $length) : array
    {
        preg_match_all("/(?:.|\p{L}|\w){1,{$length}}/u", $this->string, $chunks);

        return array_map(function ($chunk) {
            return new static($chunk);
        }, $chunks[0]);
    }

    /**
     * Split the string into an array containing a specific number of chunks.
     *
     * @param int $chunks The number of chunks
     *
     * @return \PHLAK\Twine\Str[]
     */
    public function split(int $chunks) : array
    {
        $length = ceil($this->length() / $chunks);
        preg_match_all("/(?:.|\p{L}|\w){1,{$length}}/u", $this->string, $chunks);

        return array_map(function ($chunk) {
            return new static($chunk);
        }, $chunks[0]);
    }
}
