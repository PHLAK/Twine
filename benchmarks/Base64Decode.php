<?php

namespace PHLAK\Twine\Benchmarks;

use PHLAK\Twine;

class Base64Decode extends Benchmark
{
    /** @var string A short string used for benchmark input */
    protected $shortString = 'am9obiBwaW5rZXJ0b24=';

    /** @var string A long string used for benchmark input */
    protected $longString = 'TG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFtZXQsIGNvbnNlY3RldHVyIGFkaXBpc2NpbmcgZWxpdC4gSW50ZWdlciBtYXR0aXMgbmVjIGlwc3VtIGhlbmRyZXJpdCB1bHRyaWNlcy4gUGVsbGVudGVzcXVlIGhhYml0YW50IG1vcmJpIHRyaXN0aXF1ZSBzZW5lY3R1cyBldCBuZXR1cyBldCBtYWxlc3VhZGEgZmFtZXMgYWMgdHVycGlzIGVnZXN0YXMuIEFlbmVhbiBhY2N1bXNhbiBhYyBuaXNpIHNlZCBsdWN0dXMuIFN1c3BlbmRpc3NlIGludGVyZHVtIHF1YW0gc2VtLCBhYyBsb2JvcnRpcyBtaSB2YXJpdXMgc2l0IGFtZXQuIE1hZWNlbmFzIHNpdCBhbWV0IG1vbGVzdGllIHR1cnBpcy4gU2VkIHB1bHZpbmFyIGZhdWNpYnVzIGVsaXQgZXQgdmFyaXVzLiBBbGlxdWFtIGRpZ25pc3NpbSBlcmF0IHZpdGFlIHVsdHJpY2VzIHRlbXB1cy4gU2VkIG5pc2kgbWF1cmlzLCBvcm5hcmUgdml0YWUgZW5pbSBldSwgZ3JhdmlkYSBwaGFyZXRyYSBuZXF1ZS4gUGVsbGVudGVzcXVlIHZlbCB0dXJwaXMgaW4gdG9ydG9yIG1hdHRpcyBiaWJlbmR1bS4gRG9uZWMgdGVtcG9yIHZlbCBlc3QgdXQgY3Vyc3VzLiBQaGFzZWxsdXMgaGVuZHJlcml0IHNlbXBlciBwbGFjZXJhdC4gU2VkIHVsdHJpY2VzLCB0b3J0b3IgdXQgbHVjdHVzIHZvbHV0cGF0LCBtZXR1cyBlc3QgdWxsYW1jb3JwZXIgc2VtLCBuZWMgdWxsYW1jb3JwZXIgYW50ZSBkaWFtIGNvbmRpbWVudHVtIHZlbGl0Lg==';

    /**
     * The Twine method benchmark.
     *
     * @param \PHLAK\Twine\Str $input
     *
     * @return void
     */
    protected function twineBenchmark(Twine\Str $input)
    {
        $input->base64Decode();
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
        base64_decode($input);
    }
}
