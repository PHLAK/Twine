<?php

namespace PHLAK\Twine\Traits;

trait Searchable
{
    /**
     * Return the first occurence of a matched pattern.
     *
     * @param string $pattern The patern to be matched
     *
     * @return self
     */
    public function match(string $pattern) : self
    {
        preg_match($pattern, $this->string, $matches);

        return new static($matches[0], $this->encoding);
    }

    /**
     * Return an array of occurences of a matched pattern.
     *
     * @param string $pattern The pattern to be matched
     *
     * @return array
     */
    public function matchAll(string $pattern) : array
    {
        preg_match_all($pattern, $this->string, $matches);

        return array_map(function (string $match) {
            return new static($match, $this->encoding);
        }, $matches[0]);
    }
}
