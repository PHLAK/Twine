<?php

if (! function_exists('str')) {
    /**
     * Create a Twine string object.
     *
     * @param mixed $string A string
     *
     * @return \PHLAK\Twine\Str
     */
    function str($string)
    {
        return new PHLAK\Twine\Str($string);
    }
}
