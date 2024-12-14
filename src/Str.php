<?php

namespace PHLAK\Twine;

use ArrayAccess;
use JsonSerializable;

/** @implements ArrayAccess<int, string> */
class Str implements ArrayAccess, JsonSerializable
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

    /** The raw string. */
    public readonly string $string;

    /** The internal character encoding. */
    public readonly string $encoding;

    /**
     * Create a new Str object.
     *
     * @param string|int| $string A string
     * @param string $encoding The internal encoding
     *
     * @return \PHLAK\Twine\Str
     */
    public function __construct(mixed $string = '', $encoding = null)
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

    /** @return array{string: string, encoding: string} */
    public function __serialize(): array
    {
        return [
            'string' => $this->string,
            'encoding' => $this->encoding,
        ];
    }

    /** @param array{string: string, encoding: string} $data */
    public function __unserialize(array $data): void
    {
        $this->string = $data['string'];
        $this->encoding = $data['encoding'];
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
