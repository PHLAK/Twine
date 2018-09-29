<?php

namespace PHLAK\Twine\Methods;

class StartsWith extends Method
{
    /**
     * Determine if the string starts with another string.
     *
     * @param string $string The string to compare against
     *
     * @return bool True if the string starts with $string, otherwise false
     */
    public function __invoke(string $string) : bool
    {
        return mb_substr($this->string, 0, mb_strlen($string)) == $string;
    }
}
