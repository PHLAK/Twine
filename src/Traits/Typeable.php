<?php

namespace PHLAK\Twine\Traits;

trait Typeable
{
    /**
     * Determine if the string is composed of alphanumeric characters.
     *
     * @return bool
     */
    public function isAlphanumeric(): bool
    {
        return ctype_alnum($this->string);
    }

    /**
     * Determine if the string is composed of alphabetic characters.
     *
     * @return bool
     */
    public function isAlphabetic(): bool
    {
        return ctype_alpha($this->string);
    }

    /**
     * Determine if the string is composed of numeric characters.
     *
     * @return bool
     */
    public function isNumeric(): bool
    {
        return ctype_digit($this->string);
    }

    /**
     * Determine if the string is composed of lowercase characters.
     *
     * @return bool
     */
    public function isLowercase(): bool
    {
        return ctype_lower($this->string);
    }

    /**
     * Determine if the string is composed of uppercase characters.
     *
     * @return bool
     */
    public function isUppercase(): bool
    {
        return ctype_upper($this->string);
    }

    /**
     * Determine if the string is composed of whitespace characters.
     *
     * @return bool
     */
    public function isWhitespace(): bool
    {
        return ctype_space($this->string);
    }

    /**
     * Determine if the string is composed of punctuation characters.
     *
     * @return bool
     */
    public function isPunctuation(): bool
    {
        return ctype_punct($this->string);
    }

    /**
     * Determine if the string is composed of printable characters.
     *
     * @return bool
     */
    public function isPrintable(): bool
    {
        return ctype_print($this->string);
    }
}
