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
    public function crc32(): int
    {
        return crc32($this->string);
    }

    /**
     * Hash the string using the standard Unix DES-based algorithm or an
     * alternative algorithm that may be available on the system.
     *
     * @param string $salt A salt string to base the hashing on
     */
    public function crypt(string $salt): self
    {
        return new self(crypt($this->string, $salt), $this->encoding);
    }

    /**
     * Calculate the md5 hash of the string.
     *
     * @param Config\Md5 $mode A md5 mode flag
     *
     * Available md5 modes:
     *
     *   - Twine\Config\Md5::DEFAULT - Return the hash
     *   - Twine\Config\Md5::RAW - Return the raw binary of the hash
     */
    public function md5(Config\Md5 $mode = Config\Md5::DEFAULT): self
    {
        return new self(hash('md5', $this->string, $mode === Config\Md5::RAW), $this->encoding);
    }

    /**
     * Calculate the sha1 hash of the string.
     *
     * @param Config\Sha1 $mode A sha1 mode flag
     *
     *  Available sha1 modes:
     *
     *   - Twine\Config\Sha1::DEFAULT - Return the hash
     *   - Twine\Config\Sha1::RAW - Return the raw binary of the hash
     */
    public function sha1(Config\Sha1 $mode = Config\Sha1::DEFAULT): self
    {
        return new self(hash('sha1', $this->string, $mode === Config\Sha1::RAW), $this->encoding);
    }

    /**
     * Calculate the sha256 hash of the string.
     *
     * @param Config\Sha256 $mode A sha256 mode flag
     *
     *  Available sha256 modes:
     *
     *   - Twine\Config\Sha256::DEFAULT - Return the hash
     *   - Twine\Config\Sha256::RAW - Return the raw binary of the hash
     */
    public function sha256(Config\Sha256 $mode = Config\Sha256::DEFAULT): self
    {
        return new self(hash('sha256', $this->string, $mode === Config\Sha256::RAW), $this->encoding);
    }

    /**
     * Creates a hash from the string using the CRYPT_BLOWFISH algorithm.
     *
     * @param array<int|string> $options An array of bcrypt hashing options
     */
    public function bcrypt(array $options = []): self
    {
        return new self(password_hash($this->string, PASSWORD_BCRYPT, $options), $this->encoding);
    }
}
