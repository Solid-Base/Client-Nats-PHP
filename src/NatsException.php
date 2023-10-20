<?php

namespace SolidBase\Nats;

/**
 * Class Exception
 *
 * @package Nats
 */
class NatsException extends \Exception
{
    /**
     * Creates an Exception for a failed connection.
     *
     * @param string $response The failed error response.
     *
     */
    public static function forFailedConnection(string $response): self
    {
        return new static(sprintf('Failed to connect: %s', $response));
    }


    /**
     * Creates an Exception for a failed PING response.
     *
     * @param string $response The failed PING response.
     */
    public static function forFailedPing(string $response): self
    {
        return new static(sprintf('Failed to ping: %s', $response));
    }


    /**
     * Creates an Exception for an invalid Subscription Identifier (sid).
     *
     * @param string $subscription The Subscription Identifier (sid).
     *
     */
    public static function forSubscriptionNotFound(string $subscription): self
    {
        return new static(sprintf('Subscription not found: %s', $subscription));
    }


    /**
     * Creates an Exception for an invalid Subscription Identifier (sid) callback.
     *
     * @param string $subscription The Subscription Identifier (sid).
     *
     */
    public static function forSubscriptionCallbackInvalid(string $subscription): self
    {
        return new static(sprintf('Subscription callback is invalid: %s', $subscription));
    }


    /**
     * Creates an Exception for the failed creation of a Stream Socket Client.
     *
     * @param string  $message The system level error message.
     * @param integer $code    The system level error code.
     *
     */
    public static function forStreamSocketClientError(string $message, int $code): self
    {
        return new static(sprintf('A Stream Socket Client could not be created: (%d) %s', $code, $message), $code);
    }
}
