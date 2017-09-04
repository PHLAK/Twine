<?php

namespace PHLAK\Twine\Traits;

trait Hashable
{
    /**
     *  Calculate the crc32 polynomial of the string.
     *
     * @return int The crc32 polynomial of the string
     */
    public function crc32()
    {
        return crc32($this->string);
    }

    /**
     * Hash the string using the standard Unix DES-based algorithm or an
     * alternative algorithm that may be available on the system.
     *
     * @param string $salt A salt string to base the hashing on
     *
     * @return Twine\Str
     */
    public function crypt($salt = null)
    {
        return new static(crypt($this->string, $salt));
    }

    /**
     * Calculate the md5 hash of the string.
     *
     * @param bool $raw If true, returns the raw binary of the hash
     *
     * @return Twine\Str
     */
    public function md5($raw = false)
    {
        return new static(hash('md5', $this->string, $raw));
    }

    /**
     * Calculate the sha1 hash of the string.
     *
     * @param bool $raw If true, returns the raw binary of the hash
     *
     * @return Twine\Str
     */
    public function sha1($raw = false)
    {
        return new static(hash('sha1', $this->string, $raw));
    }

    /**
     * Calculate the sha256 hash of the string.
     *
     * @param bool $raw If true, returns the raw binary of the hash
     *
     * @return Twine\Str
     */
    public function sha256($raw = false)
    {
        return new static(hash('sha256', $this->string, $raw));
    }
}
