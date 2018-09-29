<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;
use PHLAK\Twine\Exceptions\DecryptionException;

class Decrypt extends Method
{
    /** @var array Supported cipher methods */
    protected $supportedCiphers = [
        'aes-128-cbc',
        'AES-128-CBC',
        'aes-256-cbc',
        'AES-256-CBC'
    ];

    /**
     * Decrypt the string.
     *
     * @param string $key    The key for decrypting
     * @param string $cipher The cipher method
     *
     * Supported cipher methods:
     *
     *   - AES-128-CBC (default)
     *   - AES-256-CBC
     *
     * @throws \PHLAK\Twine\Exceptions\DecryptionException
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke(string $key, string $cipher = 'AES-128-CBC') : Twine\Str
    {
        if (! $this->isEncrypted($cipher)) {
            throw new DecryptionException('The string is not an encrypted string');
        }

        $payload = json_decode(base64_decode($this->string));
        $expectedHmac = hash_hmac('sha256', $payload->iv . $payload->ciphertext, $key = md5($key));

        if (! hash_equals($payload->hmac, $expectedHmac)) {
            throw new DecryptionException('The HMAC is invalid');
        }

        $plaintext = openssl_decrypt($payload->ciphertext, $cipher, $key, 0, base64_decode($payload->iv));

        if ($plaintext === false) {
            throw new DecryptionException('Failed to decrypt the string');
        }

        return new Twine\Str($plaintext);
    }

    /**
     * Determine if the string is an encrypted string.
     *
     * @return bool True if the string is an encrypted string, otherwise false
     */
    protected function isEncrypted(string $cipher)
    {
        $payload = json_decode(base64_decode($this->string));

        return isset($payload->iv, $payload->ciphertext, $payload->hmac)
            && strlen(base64_decode($payload->iv)) === openssl_cipher_iv_length($cipher);
    }
}
