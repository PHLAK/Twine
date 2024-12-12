<?php

namespace PHLAK\Twine\Traits;

trait ArrayAccess
{
    /**
     * Determine whether a character exists in the string at a specific offset.
     *
     * @param int $offset Offset to check for existence
     */
    public function offsetExists($offset): bool
    {
        return isset($this->string[$offset]);
    }

    /**
     * Retrieve a character from the string at a specific offset.
     *
     * @param int $offset Position of character to get
     */
    public function offsetGet($offset): string
    {
        // NOTE: Return an instance of Str?
        return $this->string[$offset];
    }

    /**
     * Not implemented due to immutability.
     *
     * @param int $offset Not implemented
     * @param mixed $value Not implemented
     *
     * @throws \RuntimeException
     */
    public function offsetSet($offset, $value): void
    {
        throw new \RuntimeException('Cannot set string offsets; Twine\Str objects are immutable');
    }

    /**
     * Not implemented due to immutability.
     *
     * @param int $offset Not implemented
     *
     * @throws \RuntimeException
     */
    public function offsetUnset($offset): void
    {
        throw new \RuntimeException('Cannot unset string offsets; Twine\Str objects are immutable');
    }
}
