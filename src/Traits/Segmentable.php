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
     * @return Str
     */
    public function substring($start, $length = null)
    {
        $length = isset($length) ? $length : $this->length() - $start;

        return new static(substr($this->string, $start, $length));
    }

    /**
     * Return part of the string occuring before a specific character.
     *
     * @param string $character The delimiting character
     *
     * @return Str
     */
    public function before($character)
    {
        return new static(explode($character, $this->string, 2)[0]);
    }

    /**
     * Return part of the string occuring after a specific character.
     *
     * @param string $character The delimiting character
     *
     * @return Str
     */
    public function after($character)
    {
        return new static(explode($character, $this->string, 2)[1]);
    }
}
