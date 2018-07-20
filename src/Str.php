<?php

namespace PHLAK\Twine;

use PHLAK\Twine\Traits\Aliases;
use PHLAK\Twine\Traits\ArrayAccess;
use PHLAK\Twine\Traits\Comparable;
use PHLAK\Twine\Traits\Convenience;
use PHLAK\Twine\Traits\Encodable;
use PHLAK\Twine\Traits\Encryptable;
use PHLAK\Twine\Traits\Hashable;
use PHLAK\Twine\Traits\Segmentable;
use PHLAK\Twine\Traits\Transformable;

class Str implements \ArrayAccess, \JsonSerializable, \Serializable
{
    use Aliases,
        ArrayAccess,
        Comparable,
        Convenience,
        Encodable,
        Encryptable,
        Hashable,
        Segmentable,
        Transformable;

    /** @var string A string */
    protected $string;

    /**
     * Create a new Str object.
     *
     * @param mixed $string A string
     */
    public function __construct($string = '')
    {
        $this->string = (string) $string;
    }

    /**
     * Magic toString method. Returns the object as a string.
     *
     * @return string The string
     */
    public function __toString() : string
    {
        return $this->string;
    }

    /**
     * Static make constructor.
     *
     * @param string $string A string
     *
     * @return self
     */
    public static function make($string) : self
    {
        return new static($string);
    }

    /**
     * Returns the object as a string when json_encode is called.
     *
     * @return string
     */
    public function jsonSerialize() : string
    {
        return $this->string;
    }

    /**
     * Serialize the string.
     *
     * @return string
     */
    public function serialize() : string
    {
        return serialize($this->string);
    }

    /**
     * Unserialize the string.
     *
     * @return void
     */
    public function unserialize($serialized)
    {
        $this->string = unserialize($serialized);
    }
}
