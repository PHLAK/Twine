<?php

namespace PHLAK\Twine\Benchmarks;

use PHLAK\Twine;
use PHLAK\Twine\Benchmarks\Exceptions\BenchmarkException;

class Decrypt extends Benchmark
{
    /** @var string A short string used for benchmark input */
    protected $shortString = 'eyJpdiI6IjR1a3dRdVk1Q0ZmeXYyekRiN0pucVE9PSIsImNpcGhlcnRleHQiOiJRRGRwUUhvcWpKSjZiQ3gyK3dEUEpBPT0iLCJobWFjIjoiNWJlMGZmZGQxNmQ4NDA3MmU1NTA2MTYwMzFjN2FlOTZiZWQ0OWVkMDc5NGVkYzc1ZDFmOWM3N2FkZjE0ZmQzOCJ9';

    /** @var string A long string used for benchmark input */
    protected $longString = 'eyJpdiI6IkdwVDdlR0JCZWxcL1RSTm1QbU9pNVRnPT0iLCJjaXBoZXJ0ZXh0IjoiQjVoQjdkQXczQjV5ZTZwTGJKMEZUMGgyaEpSd010UDVSVnhnTzRRWitzQzBmc0tJWmR4aDFQU05xQW8wYW83WXh2QUkxcVNidjJWbzNlcG03QmVcLzdsRjlSUUV0RjNtSEJYRjhPdHhVXC9ZdzI4VjhVRVhkWUdxSW1cL0Y1VTJzMU9QRTFUQ3dyeitaZGllczZhWW5iUHd6VnFDRkd1MUx0ZkU2N0R5RnRZNllhNzBlRWQ4QTJMd0g4bkVKa0dOQUFUd0FVb0xMdjVcL090RllUeUsxd1wvRDBlKzk5TjlSYkhPWkEzUXk2UkJENXFXeUY3S21CRmpxeDFJa043SlFibnJyVHdhZzN2NENMbFl5K3p2WU5ERmFMaEpsaGl0VU11UVRsaU4rY0ROVzJCU25sZnhpbEI2ZVNwUkhKOVJheFwvN3RZVmt6dlhmRDZWWlUzMUZPNmpOSjhWclptdVpaQXB5ZzVuWkZhT3pyQmxDQ296ZFdcL2dZdG5xYW5KQzBUM2lIUm1iSWIyeGY2Z1wvOEJQRmMxV0ZQanVEYk5cL1hEQVpYQ056STl4T2ZzeHYxUHo3cFFSSk0zTk5VRCtcL3JURkNkSDg1NVZua2E0VEVhYTRzd2Y5aHZqSU1DQitvdU00XC9FM0RoQ0pqMUI4cXdDYzlza0pnczZDSzJMTHFlWktHTFh6NDdqU3ZlVlRxaitjY284MWNQMkxJYURlMzNcL2lMWUptU1RmdG9SMmJ4Nm1JT090Y1JUTktVb3JybU1tR0EwN2V5ZXpjRnRCNE95eGhCXC9DYUpadGJtUllNQnRYYlZOWU9wczZadWhEWE5ZXC9NMXJ0a2x4YUVQcTN5MkhtOXBuVDN0MmE4UENBMXoxNFVmM1pwQ3h0S1NFZ2RveXVib0NBZXpYemxGeVBtckV2aHNcL0JCaElIS2ZXMExPR1F0OFRFVFlseWEyOWtKTXE2WVdxNFRiQm5SZG1VN1dGNFJIaXhrTXZadmx4U1hoRzdmeUJyYVhIdGNFeUppSkIwTDhndWVLWHAzclZZZUErcXhkWTlUbW50TFwvK0NDRHJCeFd2cG9rTDQ3N2s2VzdKSmN5TE1uZTBES2VcL1JQY0ZDUjFIU2tlWVNyeGswaWpwK3V6ek9GVG9reUlwYzJucVhFdUhnZ2YzY3NlUmxuaXlyS1ZxbTIxK3VlRG9yUEJVQkVFRzlkWEM1SkxDaFJ4d2FHeFwvR2VOYk9rNVZWWW41bXMzWXhVYW9FcHQ0YmE3UUJIMHdCUlBIdWh1UVF6VTFlcjR1VzRFTWcrRTNKUmJUQUFYRmczN0dwQ2FFQT09IiwiaG1hYyI6ImFkOTI3MWQwMzEwYWMyNmYyMTEzYWRmNTZiYmIwMDRjZmRlYmFlMzY2ZTJhZjc1YTAzMzE5OTE0ZTJmMTMwMzIifQ==';

    /**
     * The Twine method benchmark.
     *
     * @param \PHLAK\Twine\Str $input
     *
     * @return void
     */
    protected function twineBenchmark(Twine\Str $input)
    {
        $input->decrypt('secret');
    }

    /**
     * The native PHP benchmark.
     *
     * @param string $input
     *
     * @return void
     */
    protected function nativeBenchmark(string $input)
    {
        throw new BenchmarkException('No equivilent native method availabe');
    }
}
