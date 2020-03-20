<?php

namespace PHLAK\Twine\Config;

use PHLAK\Twine\Exceptions\ConfigException;

class Str
{
    /** @var string The default internal character encoding */
    protected static $encoding = 'UTF-8';

    /**
     * Set the default internal character encoding.
     *
     * @param string $encoding The desired character encoding
     *
     * @return void
     */
    public static function setEncoding(string $encoding)
    {
        if (! in_array($encoding, mb_list_encodings())) {
            throw new ConfigException('Invalid encoding specified');
        }

        self::$encoding = $encoding;
    }

    /**
     * Get the default internal character encoding.
     *
     * @return string
     */
    public static function getEncoding(): string
    {
        return self::$encoding;
    }
}
