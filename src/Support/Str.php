<?php

namespace PHLAK\Twine\Support;

class Str
{
    /**
     * Split a string into an array of characters.
     *
     * @param string $string A String
     */
    public static function characters(string $string): array
    {
        return preg_split('//u', $string, -1, PREG_SPLIT_NO_EMPTY);
    }

    /**
     * Split an string into an array of words.
     *
     * @param string $string A String
     */
    public static function words(string $string): array
    {
        preg_match_all('/\p{Lu}?[\p{Ll}0-9]+/u', $string, $matches);

        return $matches[0];
    }
}
