<?php

namespace PHLAK\Twine\Config;

final class Trim extends Config
{
    const MASK = " \t\n\r\0\x0B";
    const BOTH = 'trim';
    const LEFT = 'ltrim';
    const RIGHT = 'rtrim';
}
