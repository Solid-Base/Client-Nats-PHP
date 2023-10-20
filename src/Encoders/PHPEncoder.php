<?php

namespace SolidBase\Nats\Encoders;

class PHPEncoder implements Encoder
{
    public function encode(mixed $payload): string
    {
        $payload = serialize($payload);
        return $payload;
    }


    public function decode(string $payload): mixed
    {
        $payload = unserialize($payload);
        return $payload;
    }
}
