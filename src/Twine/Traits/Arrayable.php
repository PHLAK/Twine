<?php

namespace Twine\Traits;

trait Arrayable
{
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
}
