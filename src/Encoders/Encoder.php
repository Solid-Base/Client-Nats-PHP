<?php

namespace SolidBase\Nats\Encoders;

interface Encoder
{
    /**
     * Encodes a message.
     *
     * @param mixed $payload Message to encode.
     *
     */
    public function encode(mixed $payload): string;

    /**
     * Decodes a message.
     *
     * @param string $payload Message to decode.
     *
     * @return mixed
     */
    public function decode(string $payload): mixed;
}
