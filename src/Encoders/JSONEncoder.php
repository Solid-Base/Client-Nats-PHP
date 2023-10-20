<?php

namespace SolidBase\Nats\Encoders;

class JSONEncoder implements Encoder
{
    public function encode(mixed $payload): string
    {

        $payload = json_encode($payload);
        return $payload;
    }

    public function decode(string $payload): mixed
    {
        $payload = json_decode($payload, true);
        return $payload;
    }

}
