<?php

namespace PHLAK\Twine\Traits;

use PHLAK\Twine\Config;

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

        return new static($mode($this->string));
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

        if ($mode == Config\Lowercase::WORDS) {
            $string = preg_replace_callback('/([A-Z][^\s]*)/', function ($matched) {
                return lcfirst($matched[1]);
            }, $this->string);

            return new static($string);
        }

        return new static($mode($this->string));
    }

    /**
     * Convert the string to camelCase.
     *
     * @return self
     */
    public function camelCase() : self
    {
        $words = array_map(function ($word) {
            return ucfirst(mb_strtolower($word));
        }, $this->words());

        return new static(lcfirst(implode('', $words)));
    }

    /**
     * Convert the string to StudlyCase.
     *
     * @return self
     */
    public function studlyCase() : self
    {
        $words = array_map(function ($word) {
            return ucfirst(mb_strtolower($word));
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
            return mb_strtolower($word);
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
            return mb_strtolower($word);
        }, $this->words());

        return new static(implode('-', $words));
    }
}
