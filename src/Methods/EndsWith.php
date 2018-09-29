<?php

namespace PHLAK\Twine\Methods;

class EndsWith extends Method
{
    /**
     * Determine if the string ends with another string.
     *
     * @param string $string The string to compare against
     *
     * @return bool True if the string ends with $string, otherwise false
     */
    public function __invoke(string $string) : bool
    {
        return mb_substr($this->string, -mb_strlen($string)) == $string;
    }
}
