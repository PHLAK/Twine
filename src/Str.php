<?php

namespace PHLAK\Twine;

class Str implements \ArrayAccess, \JsonSerializable, \Serializable
{
    use Traits\Aliases,
        Traits\ArrayAccess,
        Traits\Caseable,
        Traits\Comparable,
        Traits\Convenience,
        Traits\Encodable,
        Traits\Encryptable,
        Traits\Hashable,
        Traits\Joinable,
        Traits\Segmentable,
        Traits\Transformable,
        Traits\Typeable;

    /** @var string A string */
    protected $string;

    /** @var string The internal character encoding */
    protected $encoding;

    /**
     * Create a new Str object.
     *
     * @param mixed $string A string
     * @param string $encoding The internal encoding
     */
    public function __construct($string = '', $encoding = null)
    {
        $this->string = (string) $string;
        $this->encoding = $encoding ?? Config\Str::getEncoding();
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

    /**
     * Set the internal character encoding.
     *
     * @param  string $encoding The desired character encoding
     *
     * @return self
     */
    public function encoding(string $encoding) : self
    {
        return new static($this->string, $encoding);
    }
}
