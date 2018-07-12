<?php

namespace PHLAK\Twine\Traits;

use PHLAK\Twine\Exceptions\DecryptionFailedException;
use PHLAK\Twine\Exceptions\NotAnEncryptedStringException;
use PHLAK\Twine\Exceptions\UnsupportedCipherException;

trait Encryptable
{
    /**
     * Encrypt the string.
     *
     * @param string $key    The key for encrypting
     * @param string $cipher The cipher method
     *
     * @throws \PHLAK\Twine\Exceptions\UnsupportedCipherException
     *
     * @return self
     */
    public function encrypt($key, $cipher = 'AES-128-CBC')
    {
        if (! in_array($cipher, openssl_get_cipher_methods(true))) {
            throw new UnsupportedCipherException("The system does not support the {$cipher} cipher");
        }

        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
        $ciphertext = openssl_encrypt($this->string, $cipher, $key, 0, $iv);

        $ivEncoded = base64_encode($iv);

        return new static("\${$ivEncoded}\${$ciphertext}");
    }

    /**
     * Decrypt the string.
     *
     * @param string $key    The key for decrypting
     * @param string $cipher The cipher method
     *
     * @throws \PHLAK\Twine\Exceptions\DecryptionFailedException
     * @throws \PHLAK\Twine\Exceptions\NotAnEncryptedStringException
     *
     * @return self
     */
    public function decrypt($key, $cipher = 'AES-128-CBC')
    {
        $encryptedStringPattern = '/\$([a-zA-Z0-9=+\/]+)\$([a-zA-Z0-9=+\/]+)/';
        if (! preg_match($encryptedStringPattern, $this->string, $matches)) {
            throw new NotAnEncryptedStringException('The string is not an encrypted string');
        }

        list($match, $iv, $ciphertext) = $matches;

        $plaintext = openssl_decrypt($ciphertext, $cipher, $key, 0, base64_decode($iv));

        if ($plaintext === false) {
            throw new DecryptionFailedException('Failed to decrypt the string');
        }

        return new static($plaintext);
    }
}
