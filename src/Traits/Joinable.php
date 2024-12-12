<?php

namespace PHLAK\Twine\Traits;

trait Joinable
{
    /**
     * Append one or more strings to the string.
     *
     * @param string ...$strings One or more strings to append
     */
    public function append(string ...$strings): self
    {
        array_unshift($strings, $this->string);

        return new self(implode($strings), $this->encoding);
    }

    /**
     * Prepend one or more strings to the string.
     *
     * @param string ...$strings One or more strings to prepend
     */
    public function prepend(string ...$strings): self
    {
        array_push($strings, $this->string);

        return new self(implode($strings), $this->encoding);
    }

    /**
     * Join two strings with another string in between.
     *
     * @param string $string The string to be joined
     * @param string $glue A string to use as the glue
     *
     * @return self
     */
    public function join(string $string, string $glue = ' ')
    {
        return new self($this->string . $glue . $string, $this->encoding);
    }
}
