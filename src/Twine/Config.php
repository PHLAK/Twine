<?php

namespace Twine;

class Config
{
    const UC_ALL = 'strtoupper';
    const UC_FIRST = 'ucfirst';
    const UC_WORDS = 'ucwords';

    const LC_ALL = 'strtolower';
    const LC_FIRST = 'lcfirst';
    const LC_WORDS = 'lcwords';

    const TRIM_MASK = " \t\n\r\0\x0B";
    const TRIM_BOTH = 'trim';
    const TRIM_LEFT = 'ltrim';
    const TRIM_RIGHT = 'rtrim';
}
