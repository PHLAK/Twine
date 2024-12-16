<?php

namespace PHLAK\Twine\Traits;

trait Segmentable
{
    /**
     * Return part of the string.
     *
     * @param int $start Starting position of the substring
     * @param int|null $length Length of substring
     */
    public function substring(int $start, ?int $length = null): self
    {
        $length = isset($length) ? $length : $this->length() - $start;

        return new self(mb_substr($this->string, $start, $length, $this->encoding), $this->encoding);
    }

    /**
     * Return part of the string occurring before a specific string.
     *
     * @param string $string The delimiting string
     */
    public function before(string $string): self
    {
        return new self(((array) mb_split($string, $this->string, 2))[0], $this->encoding);
    }

    /**
     * Return part of the string occurring after a specific string.
     *
     * @param string $string The delimiting string
     */
    public function after(string $string): self
    {
        return new self(((array) mb_split($string, $this->string, 2))[1], $this->encoding);
    }

    /**
     * Return part of the string starting from the first occurance of another string.
     *
     * @param string $string The string to start from
     */
    public function from(string $string): self
    {
        return new self(mb_strstr($this->string, $string, false, $this->encoding), $this->encoding);
    }

    /**
     * Return part of the string up to and including the first occurance of another string.
     *
     * @param string $string The string to end with
     */
    public function to(string $string): self
    {
        $substring = mb_strstr($this->string, $string, true, $this->encoding);

        return new self($substring ? $substring . $string : null, $this->encoding);
    }

    /**
     * Truncate a string to a specific length and append a suffix.
     *
     * @param int $length Length string will be truncated to, including suffix
     * @param string $suffix Suffix to append (default: '...')
     */
    public function truncate(int $length, string $suffix = '...'): self
    {
        return new self(
            $this->first($length - mb_strlen($suffix, $this->encoding))->trimRight()->append($suffix),
            $this->encoding
        );
    }

    /**
     * Spit the string into an array of chunks of a given length.
     *
     * @param int $length The desired chunk length
     *
     * @return \PHLAK\Twine\Str[]
     */
    public function chunk(int $length): array
    {
        preg_match_all("/(?:.|\p{L}|\w){1,{$length}}/u", $this->string, $chunks);

        return array_map(function (string $chunk) {
            return new self($chunk, $this->encoding);
        }, $chunks[0]);
    }

    /**
     * Split the string into an array containing a specific number of chunks.
     *
     * @param int $chunks The number of chunks
     *
     * @return \PHLAK\Twine\Str[]
     */
    public function split(int $chunks): array
    {
        $length = ceil($this->length() / $chunks);
        preg_match_all("/(?:.|\p{L}|\w){1,{$length}}/u", $this->string, $strings);

        return array_map(function (string $chunk) {
            return new self($chunk, $this->encoding);
        }, $strings[0]);
    }
}
