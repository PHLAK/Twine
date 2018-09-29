<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;
use PHLAK\Twine\Exceptions\EncryptionException;

class Encrypt extends Method
{
    /** @var array Supported cipher methods */
    protected $supportedCiphers = [
        'aes-128-cbc',
        'AES-128-CBC',
        'aes-256-cbc',
        'AES-256-CBC'
    ];

    /**
     * Encrypt the string.
     *
     * @param string $key    The key for encrypting
     * @param string $cipher The cipher method
     *
     * Supported cipher methods:
     *
     *   - AES-128-CBC (default)
     *   - AES-256-CBC
     *
     * @throws \PHLAK\Twine\Exceptions\EncryptionException
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke(string $key, string $cipher = 'AES-128-CBC') : Twine\Str
    {
        if (! in_array($cipher, $this->supportedCiphers)) {
            throw new EncryptionException('The cipher must be one of: ' . implode(', ', $this->supportedCiphers));
        }

        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
        $ciphertext = openssl_encrypt($this->string, $cipher, $key = md5($key), 0, $iv);

        $json = json_encode([
            'iv' => $iv = base64_encode($iv),
            'ciphertext' => $ciphertext,
            'hmac' => hash_hmac('sha256', $iv . $ciphertext, $key)
        ]);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new EncryptionException('Failed to encrypt the string');
        }

        return new Twine\Str(base64_encode($json));
    }
}
