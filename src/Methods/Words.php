<?php

namespace PHLAK\Twine\Methods;

class Words extends Method
{
    /**
     * Split the string into an array of words.
     *
     * @return array
     */
    public function __invoke() : array
    {
        preg_match_all('/[A-Z]?[a-z0-9]+/', $this->string, $matches);

        return $matches[0];
    }
}
