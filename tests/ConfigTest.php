<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    public function test_it_has_uppercase_config_options()
    {
        $this->assertEquals(Twine\Config\Uppercase::ALL, 'strtoupper');
        $this->assertEquals(Twine\Config\Uppercase::FIRST, 'ucfirst');
        $this->assertEquals(Twine\Config\Uppercase::WORDS, 'ucwords');
    }

    public function test_it_has_lowercase_config_options()
    {
        $this->assertEquals(Twine\Config\Lowercase::ALL, 'strtolower');
        $this->assertEquals(Twine\Config\Lowercase::FIRST, 'lcfirst');
        $this->assertEquals(Twine\Config\Lowercase::WORDS, 'lcwords');
    }

    public function test_it_has_trim_config_options()
    {
        $this->assertEquals(Twine\Config\Trim::BOTH, 'trim');
        $this->assertEquals(Twine\Config\Trim::LEFT, 'ltrim');
        $this->assertEquals(Twine\Config\Trim::RIGHT, 'rtrim');
    }

    public function test_it_has_wrap_config_options()
    {
        $this->assertFalse(Twine\Config\Wrap::SOFT);
        $this->assertTrue(Twine\Config\Wrap::HARD);
    }

    public function test_it_has_pad_config_options()
    {
        $this->assertEquals(Twine\Config\Pad::RIGHT, STR_PAD_RIGHT);
        $this->assertEquals(Twine\Config\Pad::LEFT, STR_PAD_LEFT);
        $this->assertEquals(Twine\Config\Pad::BOTH, STR_PAD_BOTH);
    }

    public function test_it_has_base64_config_options()
    {
        $this->assertEquals(Twine\Config\Base64::ENCODE, 'base64_encode');
        $this->assertEquals(Twine\Config\Base64::DECODE, 'base64_decode');
    }

    public function test_it_has_equals_config_options()
    {
        $this->assertEquals(Twine\Config\Equals::EXACT, 'strcmp');
        $this->assertEquals(Twine\Config\Equals::CASE_INSENSITIVE, 'strcasecmp');
    }
}
