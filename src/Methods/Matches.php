<?php

namespace PHLAK\Twine\Methods;

class Matches extends Method
{
    /**
     * Determine if the string matches a regular expression pattern.
     *
     * @param string $pattern A regular expression pattern
     *
     * @return bool True if the string matches the regular expression pattern
     */
    public function __invoke(string $pattern) : bool
    {
        return (bool) preg_match($pattern, $this->string);
    }
}
