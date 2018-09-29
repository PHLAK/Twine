<?php

namespace PHLAK\Twine\Methods;

use PHLAK\Twine;

class Hex extends Method
{
    /**
     * Encode and decode the string to and from hex.
     *
     * @param string $mode A hex mode flag
     *
     * Available hex modes:
     *
     *   - Twine\Config\Hex::ENCODE - Encode the string to hex
     *   - Twine\Config\Hex::DECODE - Decode the string from hex
     *
     * @return \PHLAK\Twine\Str
     */
    public function __invoke(string $mode = Twine\Config\Hex::ENCODE) : Twine\Str
    {
        Twine\Config\Hex::validateOption($mode);

        switch ($mode) {
            case Twine\Config\Hex::ENCODE:
                $split = preg_split('//u', $this->string, -1, PREG_SPLIT_NO_EMPTY);

                $string = array_reduce($split, function ($str, $char) {
                    $str .= '\x' . dechex(mb_ord($char));

                    return $str;
                }, '');
                break;

            case Twine\Config\Hex::DECODE:
                $string = preg_replace_callback('/\\\\x([0-9A-Fa-f]+)/', function ($matched) {
                    return mb_chr(hexdec($matched[1]));
                }, $this->string);
                break;

            default:
                throw new \RuntimeException('Invalid mode');
        }

        return new Twine\Str($string);
    }
}
