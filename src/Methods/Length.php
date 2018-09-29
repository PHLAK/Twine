<?php

namespace PHLAK\Twine\Methods;

class Length extends Method
{
    /**
     * Get the length of the string.
     *
     * @return int Length of the string
     */
    public function __invoke() : int
    {
        return mb_strlen($this->string);
    }
}
