<?php

namespace PHLAK\Twine\Traits;

trait Segmentable
{
    /**
     * Return part of the string.
     *
     * @param int $start  Starting position of the substring
     * @param int $length Length of substring
     *
     * @return self
     */
    public function substring($start, $length = null)
    {
        $length = isset($length) ? $length : $this->length() - $start;

        return new static(substr($this->string, $start, $length));
    }

    /**
     * Return part of the string occurring before a specific string.
     *
     * @param string $string The delimiting string
     *
     * @return self
     */
    public function before($string)
    {
        return new static(explode($string, $this->string, 2)[0]);
    }

    /**
     * Return part of the string occurring after a specific string.
     *
     * @param string $string The delimiting string
     *
     * @return self
     */
    public function after($string)
    {
        return new static(explode($string, $this->string, 2)[1]);
    }

    /**
     * Truncate a string to a specific length and append a suffix.
     *
     * @param int    $length Length string will be truncated to, including suffix
     * @param string $suffix Suffix to append (default: '...')
     *
     * @return self
     */
    public function truncate($length, $suffix = '...')
    {
        return new static(
            $this->first($length - strlen($suffix))->trimRight()->append($suffix)
        );
    }
}
