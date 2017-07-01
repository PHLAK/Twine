<?php

namespace Twine\Traits;

// TODO: nl2br

trait Wrappable
{
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
}
