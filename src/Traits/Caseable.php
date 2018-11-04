<?php

namespace PHLAK\Twine\Traits;

use PHLAK\Twine\Config;
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
     *
     * @return self
     */
    public function uppercase(string $mode = Config\Uppercase::ALL) : self
    {
        Config\Uppercase::validateOption($mode);

        switch ($mode) {
            case Config\Uppercase::ALL:
                return new static(mb_strtoupper($this->string, $this->encoding));

            case Config\Uppercase::FIRST:
                return new static(
                    mb_strtoupper(mb_substr($this->string, 0, 1, $this->encoding)) . mb_substr($this->string, 1)
                );

            case Config\Uppercase::WORDS:
                $string = preg_replace_callback('/(\p{Ll})[\S]*/u', function ($matched) {
                    return mb_strtoupper($matched[1], $this->encoding) . mb_substr($matched[0], 1, null, $this->encoding);
                }, $this->string);

                return new static($string);

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
     *
     * @return self
     */
    public function lowercase(string $mode = Config\Lowercase::ALL) : self
    {
        Config\Lowercase::validateOption($mode);

        switch ($mode) {
            case Config\Lowercase::ALL:
                return new static(mb_strtolower($this->string, $this->encoding));

            case Config\Lowercase::FIRST:
                return new static(
                    mb_strtolower(mb_substr($this->string, 0, 1, $this->encoding)) . mb_substr($this->string, 1, null, $this->encoding)
                );

            case Config\Lowercase::WORDS:
                $string = preg_replace_callback('/(\p{Lu})[\S]*/u', function ($matched) {
                    return mb_strtolower($matched[1], $this->encoding) . mb_substr($matched[0], 1, null, $this->encoding);
                }, $this->string);

                return new static($string);

            default:
                throw new RuntimeException('Invalid mode');
        }
    }

    /**
     * Convert the string to camelCase.
     *
     * @return self
     */
    public function camelCase() : self
    {
        $words = array_map(function ($word) {
            return $word->uppercaseFirst();
        }, $this->words());

        $word = implode('', $words);

        return new static(
            mb_strtolower(mb_substr($word, 0, 1, $this->encoding)) . mb_substr($word, 1, null, $this->encoding)
        );
    }

    /**
     * Convert the string to StudlyCase.
     *
     * @return self
     */
    public function studlyCase() : self
    {
        $words = array_map(function ($word) {
            return $word->uppercaseFirst();
        }, $this->words());

        return new static(implode('', $words));
    }

    /**
     * Convert the string to PascalCase.
     *
     * @return self
     */
    public function pascalCase() : self
    {
        return $this->studlyCase();
    }

    /**
     * Convert the string to snake_case.
     *
     * @return self
     */
    public function snakeCase() : self
    {
        $words = array_map(function ($word) {
            return $word->lowercase();
        }, $this->words());

        return new static(implode('_', $words));
    }

    /**
     * Convert the string to kebab-case.
     *
     * @return self
     */
    public function kebabCase() : self
    {
        $words = array_map(function ($word) {
            return $word->lowercase();
        }, $this->words());

        return new static(implode('-', $words));
    }
}
