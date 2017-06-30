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

    const PAD_RIGHT = STR_PAD_RIGHT;
    const PAD_LEFT = STR_PAD_LEFT;
    const PAD_BOTH = STR_PAD_BOTH;

    const BASE64_ENCODE = 'base64_encode';
    const BASE64_DECODE = 'base64_decode';

    const WORD_COUNT = 0;
    const WORD_ARRAY = 1;
    const WORD_POSITIONS = 2;

    const CHARS_ARRAY_ALL = 0;
    const CHARS_ARRAY_USED = 1;
    const CHARS_ARRAY_NOT_USED = 2;
    const CHARS_UNIQUE = 3;
    const CHARS_NOT_USED = 4;

    const FIND_FIRST = 'strpos';
    const FIND_LAST = 'strrpos';
    const FIND_FIRST_I = 'stripos';
    const FIND_LAST_I  = 'strripos';
}
