<?php

namespace PHLAK\Twine\Traits;

trait Typeable
{
    /** Determine if the string is composed of alphanumeric characters. */
    public function isAlphanumeric(): bool
    {
        return ctype_alnum($this->string);
    }

    /** Determine if the string is composed of alphabetic characters. */
    public function isAlphabetic(): bool
    {
        return ctype_alpha($this->string);
    }

    /** Determine if the string is composed of numeric characters. */
    public function isNumeric(): bool
    {
        return ctype_digit($this->string);
    }

    /** Determine if the string is composed of lowercase characters. */
    public function isLowercase(): bool
    {
        return ctype_lower($this->string);
    }

    /** Determine if the string is composed of uppercase characters. */
    public function isUppercase(): bool
    {
        return ctype_upper($this->string);
    }

    /** Determine if the string is composed of whitespace characters. */
    public function isWhitespace(): bool
    {
        return ctype_space($this->string);
    }

    /** Determine if the string is composed of punctuation characters. */
    public function isPunctuation(): bool
    {
        return ctype_punct($this->string);
    }

    /** Determine if the string is composed of printable characters. */
    public function isPrintable(): bool
    {
        return ctype_print($this->string);
    }
}
