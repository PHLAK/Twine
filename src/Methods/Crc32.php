<?php

namespace PHLAK\Twine\Methods;

class Crc32 extends Method
{
    /**
     *  Calculate the crc32 polynomial of the string.
     *
     * @return int The crc32 polynomial of the string
     */
    public function __invoke() : int
    {
        return crc32($this->string);
    }
}
