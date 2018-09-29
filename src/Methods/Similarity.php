<?php

namespace PHLAK\Twine\Methods;

class Similarity extends Method
{
    /**
     * Calculate the similarity percentage between two strings.
     *
     * @param string $string The string to compare against
     *
     * @return float
     */
    public function __invoke(string $string) : float
    {
        similar_text($this->string, $string, $percent);

        return $percent;
    }
}
