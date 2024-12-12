<?php

namespace PHLAK\Twine\Traits;

use PHLAK\Twine\Config;
use PHLAK\Twine\Support;
use RuntimeException;

trait Caseable
{
    /**
     * Convert all or parts of the string to uppercase.
     *
     * @param string $mode An uppercase mode flag
     *
     * Available mode flags:
     *
     *   - Twine\Config\Uppercase::ALL - Uppercase all characters of the string (default)
     *   - Twine\Config\Uppercase::FIRST - Uppercase the first character of the string only
     *   - Twine\Config\Uppercase::WORDS - Uppercase the first character of each word of the string
     *
     * @throws \PHLAK\Twine\Exceptions\ConfigException
     */
    public function uppercase(string $mode = Config\Uppercase::ALL): self
    {
        Config\Uppercase::validateOption($mode);

        switch ($mode) {
            case Config\Uppercase::ALL:
                return new self(mb_strtoupper($this->string, $this->encoding), $this->encoding);

            case Config\Uppercase::FIRST:
                return new self(
                    mb_strtoupper(
                        mb_substr($this->string, 0, 1, $this->encoding), $this->encoding
                    ) . mb_substr($this->string, 1, null, $this->encoding),
                    $this->encoding
                );

            case Config\Uppercase::WORDS:
                $string = preg_replace_callback('/(\p{Ll})[\S]*/u', function (array $matched) {
                    return mb_strtoupper($matched[1], $this->encoding) . mb_substr($matched[0], 1, null, $this->encoding);
                }, $this->string);

                return new self($string, $this->encoding);

            default:
                throw new RuntimeException('Invalid mode');
        }
    }

    /**
     * Convert all or parts of the string to lowercase.
     *
     * @param string $mode A lowercase mode flag
     *
     * Available mode flags:
     *
     *   - Twine\Config\Lowercase::ALL - Lowercase all characters of the string (default)
     *   - Twine\Config\Lowercase::FIRST - Lowercase the first character of the string only
     *   - Twine\Config\Lowercase::WORDS - Lowercase the first character of each word of the string
     *
     * @throws \PHLAK\Twine\Exceptions\ConfigException
     */
    public function lowercase(string $mode = Config\Lowercase::ALL): self
    {
        Config\Lowercase::validateOption($mode);

        switch ($mode) {
            case Config\Lowercase::ALL:
                return new self(mb_strtolower($this->string, $this->encoding), $this->encoding);

            case Config\Lowercase::FIRST:
                return new self(
                    mb_strtolower(mb_substr($this->string, 0, 1, $this->encoding), $this->encoding) . mb_substr($this->string, 1, null, $this->encoding),
                    $this->encoding
                );

            case Config\Lowercase::WORDS:
                $string = preg_replace_callback('/(\p{Lu})[\S]*/u', function (array $matched) {
                    return mb_strtolower($matched[1], $this->encoding) . mb_substr($matched[0], 1, null, $this->encoding);
                }, $this->string);

                return new self($string, $this->encoding);

            default:
                throw new RuntimeException('Invalid mode');
        }
    }

    /** Convert the string to camelCase. */
    public function camelCase(): self
    {
        $words = array_map(function ($word) {
            return mb_strtoupper(mb_substr($word, 0, 1, $this->encoding), $this->encoding) . mb_substr($word, 1, null, $this->encoding);
        }, Support\Str::words($this->string));

        $word = implode('', $words);

        return new self(
            mb_strtolower(mb_substr($word, 0, 1, $this->encoding), $this->encoding) . mb_substr($word, 1, null, $this->encoding),
            $this->encoding
        );
    }

    /** Convert the string to StudlyCase. */
    public function studlyCase(): self
    {
        $words = array_map(function ($word) {
            return mb_strtoupper(mb_substr($word, 0, 1, $this->encoding), $this->encoding) . mb_substr($word, 1, null, $this->encoding);
        }, Support\Str::words($this->string));

        return new self(implode('', $words), $this->encoding);
    }

    /** Convert the string to PascalCase. */
    public function pascalCase(): self
    {
        return $this->studlyCase();
    }

    /** Convert the string to snake_case. */
    public function snakeCase(): self
    {
        $words = array_map(function ($word) {
            return mb_strtolower($word, $this->encoding);
        }, Support\Str::words($this->string));

        return new self(implode('_', $words), $this->encoding);
    }

    /** Convert the string to kebab-case. */
    public function kebabCase(): self
    {
        $words = array_map(function ($word) {
            return mb_strtolower($word, $this->encoding);
        }, Support\Str::words($this->string));

        return new self(implode('-', $words), $this->encoding);
    }
}
