<?php

namespace Twine\Traits;

// html_entity_decode, htmlentities, htmlspecialchars, htmlspecialchars_decode,
// addslashes, addcslashes, stripcslashes, strip_tags

trait Sanitizable
{
    // public function sanitize()
    // {
    //     // ...
    // }

    /**
     * Strip HTML and PHP tags from the string.
     *
     * @param  $allowedTags Tags which should not be stripped
     *
     * @return Twine\Str
     */
    public function strip($allowedTags = null)
    {
        return new static(strip_tags($this->string, $allowedTags));
    }
}
