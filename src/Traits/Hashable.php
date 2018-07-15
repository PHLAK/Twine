<?php

namespace PHLAK\Twine\Traits;

use PHLAK\Twine\Config;

trait Hashable
{
    /**
     *  Calculate the crc32 polynomial of the string.
     *
     * @return int The crc32 polynomial of the string
     */
    public function crc32() : int
    {
        return crc32($this->string);
    }

    /**
     * Hash the string using the standard Unix DES-based algorithm or an
     * alternative algorithm that may be available on the system.
     *
     * @param string $salt A salt string to base the hashing on
     *
     * @return self
     */
    public function crypt($salt) : self
    {
        return new static(crypt($this->string, $salt));
    }

    /**
     * Calculate the md5 hash of the string.
     *
     * @param bool $mode A md5 mode flag
     *
     * Available md5 modes:
     *
     *   - Twine\Config\Md5::DEFAULT - Return the hash
     *   - Twine\Config\Md5::RAW - Return the raw binary of the hash
     *
     * @return self
     */
    public function md5($mode = Config\Md5::DEFAULT) : self
    {
        Config\Md5::validateOption($mode);

        return new static(hash('md5', $this->string, $mode));
    }

    /**
     * Calculate the sha1 hash of the string.
     *
     * @param bool $mode A sha1 mode flag
     *
     *  Available sha1 modes:
     *
     *   - Twine\Config\Sha1::DEFAULT - Return the hash
     *   - Twine\Config\Sha1::RAW - Return the raw binary of the hash
     *
     * @return self
     */
    public function sha1($mode = Config\Md5::DEFAULT) : self
    {
        Config\Md5::validateOption($mode);

        return new static(hash('sha1', $this->string, $mode));
    }

    /**
     * Calculate the sha256 hash of the string.
     *
     * @param bool $mode A sha256 mode flag
     *
     *  Available sha256 modes:
     *
     *   - Twine\Config\Sha256::DEFAULT - Return the hash
     *   - Twine\Config\Sha256::RAW - Return the raw binary of the hash
     *
     * @return self
     */
    public function sha256($mode = Config\Sha256::DEFAULT) : self
    {
        Config\Sha256::validateOption($mode);

        return new static(hash('sha256', $this->string, $mode));
    }

    /**
     * Creates a hash from the string using the CRYPT_BLOWFISH algorithm.
     *
     * @param array $options An array of bcrypt hasing options
     *
     * @return self
     */
    public function bcrypt(array $options = []) : self
    {
        return new static(password_hash($this->string, PASSWORD_BCRYPT, $options));
    }
}
