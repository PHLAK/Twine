<?php

if (! function_exists('str')) {
    /**
     * Create a Twine string object.
     *
     * @return \PHLAK\Twine\Str
     */
    function str($string)
    {
        return new PHLAK\Twine\Str($string);
    }
}
