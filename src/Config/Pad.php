<?php

namespace PHLAK\Twine\Config;

enum Pad: int
{
    case RIGHT = STR_PAD_RIGHT;
    case LEFT = STR_PAD_LEFT;
    case BOTH = STR_PAD_BOTH;
}
