<?php

namespace PHLAK\Twine\Traits;

trait Joinable
{
    /**
     * Append one or more strings to the string.
     *
     * @param string ...$strings One or more strings to append
     *
     * @return self
     */
    public function append(string ...$strings) : self
    {
        array_unshift($strings, $this->string);

        return new static(implode($strings));
    }

    /**
     * Prepend one or more strings to the string.
     *
     * @param string ...$strings One or more strings to prepend
     *
     * @return self
     */
    public function prepend(string ...$strings) : self
    {
        array_push($strings, $this->string);

        return new static(implode($strings));
    }

    /**
     * Join two strings with another string in between.
     *
     * @param string $string The string to be joined
     * @param string $glue   A string to use as the glue
     *
     * @return self
     */
    public function join(string $string, string $glue = ' ')
    {
        return new static($this->string . $glue . $string);
    }
}
