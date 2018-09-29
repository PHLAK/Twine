<?php

namespace PHLAK\Twine;

class Str implements \ArrayAccess, \JsonSerializable, \Serializable
{
    use Traits\Aliases, Traits\ArrayAccess;

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
     * Magic call method for calling built-in Twine methods.
     *
     * @param string $name      The method name
     * @param array  $arguments An array of arguments
     *
     * @return mixed The output of the method
     */
    public function __call(string $name, array $arguments)
    {
        $class = '\\PHLAK\\Twine\\Methods\\' . ucfirst($name);

        if (! class_exists($class)) {
            throw new \Exception("Method class '{$class}' does not exist");
        }

        $method = new $class($this);

        if (! is_callable($method)) {
            throw new \Exception("Method class '{$class}' is not callable");
        }

        return $method(...$arguments);
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
     * Echo the string.
     *
     * @return self
     */
    public function echo() : self
    {
        echo $this->string;

        return $this;
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
