<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class Shuffle extends Method
{
    /**
     * Randomly shuffle the characters of the string.
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke() : Twine\Str
    {
        $characters = [];
        for ($character = 0; $character <= mb_strlen($this->string); $character++) {
            $characters[] = mb_substr($this->string, $character, 1);
        }

        shuffle($characters);

        return new Twine\Str(implode($characters));
    }
}
