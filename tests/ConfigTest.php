<?php

use PHLAK\Twine;

class ConfigTest extends PHPUnit_Framework_TestCase
{
    public function test_it_has_uppercase_config_options()
    {
        $this->assertEquals(Twine\Config::UC_ALL, 'strtoupper');
        $this->assertEquals(Twine\Config::UC_FIRST, 'ucfirst');
        $this->assertEquals(Twine\Config::UC_WORDS, 'ucwords');
    }

    public function test_it_has_lowercase_config_options()
    {
        $this->assertEquals(Twine\Config::LC_ALL, 'strtolower');
        $this->assertEquals(Twine\Config::LC_FIRST, 'lcfirst');
        $this->assertEquals(Twine\Config::LC_WORDS, 'lcwords');
    }

    public function test_it_has_trim_config_options()
    {
        $this->assertEquals(Twine\Config::TRIM_MASK, " \t\n\r\0\x0B");
        $this->assertEquals(Twine\Config::TRIM_BOTH, 'trim');
        $this->assertEquals(Twine\Config::TRIM_LEFT, 'ltrim');
        $this->assertEquals(Twine\Config::TRIM_RIGHT, 'rtrim');
    }

    public function test_it_has_wrap_config_options()
    {
        $this->assertFalse(Twine\Config::WRAP_SOFT);
        $this->assertTrue(Twine\Config::WRAP_HARD);
    }

    public function test_it_has_pad_config_options()
    {
        $this->assertEquals(Twine\Config::PAD_RIGHT, STR_PAD_RIGHT);
        $this->assertEquals(Twine\Config::PAD_LEFT, STR_PAD_LEFT);
        $this->assertEquals(Twine\Config::PAD_BOTH, STR_PAD_BOTH);
    }

    public function test_it_has_base64_config_options()
    {
        $this->assertEquals(Twine\Config::BASE64_ENCODE, 'base64_encode');
        $this->assertEquals(Twine\Config::BASE64_DECODE, 'base64_decode');
    }

    public function test_it_has_equals_config_options()
    {
        $this->assertEquals(Twine\Config::EQ_EXACT, 'strcmp');
        $this->assertEquals(Twine\Config::EQ_CASE_INSENSITIVE, 'strcasecmp');
    }
}
