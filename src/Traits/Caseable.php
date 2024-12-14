<?php

namespace PHLAK\Twine\Traits;

use PHLAK\Twine\Config;
use PHLAK\Twine\Support;

trait Caseable
{
    /**
     * Convert all or parts of the string to uppercase.
     *
     * @param Config\Uppercase $mode An uppercase mode flag
     *
     * Available mode flags:
     *
     *   - Twine\Config\Uppercase::ALL - Uppercase all characters of the string (default)
     *   - Twine\Config\Uppercase::FIRST - Uppercase the first character of the string only
     *   - Twine\Config\Uppercase::WORDS - Uppercase the first character of each word of the string
     */
    public function uppercase(Config\Uppercase $mode = Config\Uppercase::ALL): self
    {
        return match ($mode) {
            Config\Uppercase::ALL => new self(mb_strtoupper($this->string, $this->encoding), $this->encoding),
            Config\Uppercase::FIRST => new self(
                mb_strtoupper(
                    mb_substr($this->string, 0, 1, $this->encoding), $this->encoding
                ) . mb_substr($this->string, 1, null, $this->encoding),
                $this->encoding
            ),
            Config\Uppercase::WORDS => new self(preg_replace_callback('/(\p{Ll})[\S]*/u', function (array $matched) {
                return mb_strtoupper($matched[1], $this->encoding) . mb_substr($matched[0], 1, null, $this->encoding);
            }, $this->string), $this->encoding)
        };
    }

    /**
     * Convert all or parts of the string to lowercase.
     *
     * @param Config\Lowercase $mode A lowercase mode flag
     *
     * Available mode flags:
     *
     *   - Twine\Config\Lowercase::ALL - Lowercase all characters of the string (default)
     *   - Twine\Config\Lowercase::FIRST - Lowercase the first character of the string only
     *   - Twine\Config\Lowercase::WORDS - Lowercase the first character of each word of the string
     */
    public function lowercase(Config\Lowercase $mode = Config\Lowercase::ALL): self
    {
        return match ($mode) {
            Config\Lowercase::ALL => new self(mb_strtolower($this->string, $this->encoding), $this->encoding),
            Config\Lowercase::FIRST => new self(
                mb_strtolower(mb_substr($this->string, 0, 1, $this->encoding), $this->encoding) . mb_substr($this->string, 1, null, $this->encoding),
                $this->encoding
            ),
            Config\Lowercase::WORDS => new self(preg_replace_callback('/(\p{Lu})[\S]*/u', function (array $matched) {
                return mb_strtolower($matched[1], $this->encoding) . mb_substr($matched[0], 1, null, $this->encoding);
            }, $this->string), $this->encoding)
        };
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
