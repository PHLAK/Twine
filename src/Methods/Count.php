<?php

namespace PHLAK\Twine\Methods;

class Count extends Method
{
    /**
     * Count the number of occurrences of a substring in the string.
     *
     * @param string $string The substring to count
     *
     * @return int
     */
    public function __invoke(string $string) : int
    {
        return mb_substr_count($this->string, $string);
    }
}
