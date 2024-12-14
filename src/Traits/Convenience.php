<?php

namespace PHLAK\Twine\Traits;

use PHLAK\Twine\Config;
use PHLAK\Twine\Config\Characters;
use PHLAK\Twine\Support;

trait Convenience
{
    /**
     * Count the number of occurrences of a substring in the string.
     *
     * @param string $string The substring to count
     */
    public function count(string $string): int
    {
        return mb_substr_count($this->string, $string, $this->encoding);
    }

    /** Echo the string. */
    public function echo(): self
    {
        echo $this->string;

        return $this;
    }

    /**
     * Return the formatted string.
     *
     * @param string|int|float ...$args Any number of elements to fill the string
     */
    public function format(...$args): self
    {
        return new self(sprintf($this->string, ...$args), $this->encoding);
    }

    /**
     * Get the length of the string.
     *
     * @return int Length of the string
     */
    public function length(): int
    {
        return mb_strlen($this->string, $this->encoding);
    }

    /**
     * Split the string into an array of words.
     *
     * @return \PHLAK\Twine\Str[]
     */
    public function words(): array
    {
        preg_match_all('/\p{Lu}?[\p{Ll}0-9]+/u', $this->string, $matches);

        return array_map(function (string $words) {
            return new self($words, $this->encoding);
        }, $matches[0]);
    }

    /**
     * Split the string into an array of characters.
     *
     * @return \PHLAK\Twine\Str[]
     */
    public function characters(Characters $mode = Config\Characters::ALL): array
    {
        $characters = Support\Str::characters($this->string);

        if ($mode === Config\Characters::UNIQUE) {
            $characters = array_values(array_unique($characters));
        }

        return array_map(function ($character) {
            return new self($character, $this->encoding);
        }, $characters);
    }

    /**
     * Get every nth character of the string.
     *
     * @param int $step The number of characters to step
     * @param int $offset The string offset to start at
     */
    public function nth(int $step, int $offset = 0): self
    {
        $length = $step - 1;
        $substring = mb_substr($this->string, $offset, null, $this->encoding);

        preg_match_all("/(?:^|(?:.|\p{L}|\w){{$length}})(.|\p{L}|\w)/u", $substring, $matches);

        return new self(implode($matches[1]), $this->encoding);
    }

    /** Determine if the string is empty. */
    public function isEmpty(): bool
    {
        return empty($this->string);
    }

    /** Determine if the string is not empty. */
    public function isNotEmpty(): bool
    {
        return ! empty($this->string);
    }
}
