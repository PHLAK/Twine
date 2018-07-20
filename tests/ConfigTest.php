<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    public function test_it_has_base64_config_options()
    {
        $this->assertEquals('base64_encode', Twine\Config\Base64::ENCODE);
        $this->assertEquals('base64_decode', Twine\Config\Base64::DECODE);
    }

    public function test_it_has_equals_config_options()
    {
        $this->assertEquals('strcmp', Twine\Config\Equals::CASE_SENSITIVE);
        $this->assertEquals('strcasecmp', Twine\Config\Equals::CASE_INSENSITIVE);
    }

    public function test_it_has_hex_config_options()
    {
        $this->assertEquals('encode', Twine\Config\Hex::ENCODE);
        $this->assertEquals('decode', Twine\Config\Hex::DECODE);
    }

    public function test_it_has_lowercase_config_options()
    {
        $this->assertEquals('strtolower', Twine\Config\Lowercase::ALL);
        $this->assertEquals('lcfirst', Twine\Config\Lowercase::FIRST);
        $this->assertEquals('lcwords', Twine\Config\Lowercase::WORDS);
    }

    public function test_it_has_md5_config_options()
    {
        $this->assertFalse(Twine\Config\Md5::DEFAULT);
        $this->assertTrue(Twine\Config\Md5::RAW);
    }

    public function test_it_has_pad_config_options()
    {
        $this->assertEquals(STR_PAD_RIGHT, Twine\Config\Pad::RIGHT);
        $this->assertEquals(STR_PAD_LEFT, Twine\Config\Pad::LEFT);
        $this->assertEquals(STR_PAD_BOTH, Twine\Config\Pad::BOTH);
    }

    public function test_it_has_sha1_config_options()
    {
        $this->assertFalse(Twine\Config\Sha1::DEFAULT);
        $this->assertTrue(Twine\Config\Sha1::RAW);
    }

    public function test_it_has_sha256_config_options()
    {
        $this->assertFalse(Twine\Config\Sha256::DEFAULT);
        $this->assertTrue(Twine\Config\Sha256::RAW);
    }

    public function test_it_has_trim_config_options()
    {
        $this->assertEquals('trim', Twine\Config\Trim::BOTH);
        $this->assertEquals('ltrim', Twine\Config\Trim::LEFT);
        $this->assertEquals('rtrim', Twine\Config\Trim::RIGHT);
    }

    public function test_it_has_uppercase_config_options()
    {
        $this->assertEquals('strtoupper', Twine\Config\Uppercase::ALL);
        $this->assertEquals('ucfirst', Twine\Config\Uppercase::FIRST);
        $this->assertEquals('ucwords', Twine\Config\Uppercase::WORDS);
    }

    public function test_it_has_wrap_config_options()
    {
        $this->assertFalse(Twine\Config\Wrap::SOFT);
        $this->assertTrue(Twine\Config\Wrap::HARD);
    }
}
