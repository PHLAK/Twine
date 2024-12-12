<?php

namespace PHLAK\Twine;

use ArrayAccess;
use JsonSerializable;
use Serializable;

/** @implements ArrayAccess<int, string> */
class Str implements ArrayAccess, JsonSerializable, Serializable
{
    use Traits\Aliases;
    use Traits\ArrayAccess;
    use Traits\Caseable;
    use Traits\Comparable;
    use Traits\Convenience;
    use Traits\Encodable;
    use Traits\Encryptable;
    use Traits\Hashable;
    use Traits\Joinable;
    use Traits\Searchable;
    use Traits\Segmentable;
    use Traits\Transformable;
    use Traits\Typeable;

    /** @var string A string */
    protected $string;

    /** @var string The internal character encoding */
    protected $encoding;

    /**
     * Create a new Str object.
     *
     * @param mixed $string A string
     * @param string $encoding The internal encoding
     *
     * @return \PHLAK\Twine\Str
     */
    public function __construct($string = '', $encoding = null)
    {
        $this->encoding = $encoding ?? Config\Str::getEncoding();
        $this->string = mb_convert_encoding((string) $string, $this->encoding);
    }

    /**
     * Magic toString method. Returns the object as a string.
     *
     * @return string The string
     */
    public function __toString(): string
    {
        return $this->string;
    }

    /**
     * Static make constructor.
     *
     * @param mixed ...$parameters The parameters
     */
    public static function make(...$parameters): self
    {
        return new self(...$parameters);
    }

    /** Returns the object as a string when json_encode is called. */
    public function jsonSerialize(): string
    {
        return $this->string;
    }

    /** Serialize the string. */
    public function serialize(): string
    {
        return serialize($this->string);
    }

    /** Unserialize the string. */
    public function unserialize($serialized)
    {
        $this->string = unserialize($serialized);
    }

    /**
     * Set the internal character encoding.
     *
     * @param string $encoding The desired character encoding
     */
    public function encoding(string $encoding): self
    {
        return new self($this->string, $encoding);
    }
}
