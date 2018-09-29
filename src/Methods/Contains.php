<?php

namespace PHLAK\Twine\Methods;

class Contains extends Method
{
    /**
     * Determine if the string contains another string.
     *
     * @param string $string The string to compare against
     *
     * @return bool True if the string contains $string, otherwise false
     */
    public function __invoke(string $string) : bool
    {
        return mb_strpos($this->string, $string) !== false;
    }
}
