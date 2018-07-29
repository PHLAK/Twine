<?php

namespace PHLAK\Twine\Traits;

trait Caseable
{
    /**
     * Convert the string to camelCase.
     *
     * @return self
     */
    public function camelCase() : self
    {
        $words = array_map(function ($word) {
            return ucfirst(strtolower($word));
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
            return ucfirst(strtolower($word));
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
            return strtolower($word);
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
            return strtolower($word);
        }, $this->words());

        return new static(implode('-', $words));
    }
}
