<?php

namespace PHLAK\Twine;

use PHLAK\Twine\Traits\Aliases;
use PHLAK\Twine\Traits\ArrayAccess;
use PHLAK\Twine\Traits\Comparable;
use PHLAK\Twine\Traits\Convinience;
use PHLAK\Twine\Traits\Hashable;
use PHLAK\Twine\Traits\Segmentable;
use PHLAK\Twine\Traits\Transformable;

class Str implements \ArrayAccess, \JsonSerializable
{
    use Aliases,
        ArrayAccess,
        Comparable,
        Convinience,
        Hashable,
        Segmentable,
        Transformable;

    /** @var string A string */
    protected $string;

    /**
     * Str constructor, runs on object creation.
     *
     * @param string $string A string
     */
    public function __construct($string = '')
    {
        $this->string = $string;
    }

    /**
     * Magic toString method. Returns the object as a string.
     *
     * @return string The string
     */
    public function __toString()
    {
        return $this->string;
    }

    /**
     * jsonSerialize method. Returns the object as a string when json_encode is called upon Str.
     *
     * @return string The string
     */
    public function jsonSerialize()
    {
        return $this->string;
    }
}
