<?php

namespace SolidBase\Nats;

class RandomGenerator
{
    public function generateString(int $len): string
    {
        return bin2hex(random_bytes($len));
    }
}
