<?php

namespace PHLAK\Twine\Traits;

trait ArrayAccess
{
    /**
     * Determine whether a character exists in the string at a specific offset.
     *
     * @param int $offset Offset to check for existence
     *
     * @return bool
     */
    public function offsetExists($offset) : bool
    {
        return isset($this->string[$offset]);
    }

    /**
     * Retrieve a character from the string at a specific offset.
     *
     * @param int $offset Position of character to get
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        // NOTE: Return an instance of Str?
        return $this->string[$offset];
    }

    /**
     * Not implemented due to immutability.
     *
     * @param int   $offset Not implemented
     * @param mixed $value  Not implemented
     *
     * @throws \RuntimeException
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        throw new \RuntimeException('Not implemented; Twine\Str objects are immutable');
    }

    /**
     * Not implemented due to immutability.
     *
     * @param int $offset Not implemented
     *
     * @throws \RuntimeException
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        throw new \RuntimeException('Not implemented; Twine\Str objects are immutable');
    }
}
