<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

abstract class Method
{
    /** @var \PHLAK\Twine\Str A Twine\Str object */
    protected $string;

    /**
     * Create a new Method object.
     *
     * @param \PHLAK\Twine\Str $string A Twine\Str object
     */
    public function __construct(Twine\Str $string)
    {
        $this->string = $string;
    }
}
