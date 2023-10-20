<?php

namespace SolidBase\Nats;

class ServerInfo
{
    /**
     * Server unique ID
     *
     * @var string
     */
    private string $serverID;

    /**
     * Server hostname
     *
     * @var string
     */
    private string $host;

    /**
     * Server port
     *
     * @var integer
     */
    private int $port;

    /**
     * Server version number
     *
     * @var string
     */
    private string $version;

    /**
     * Server Golang version
     *
     * @var string
     */
    private string $goVersion;

    /**
     * Is authorization required?
     *
     * @var boolean
     */
    private bool $authRequired;

    /**
     * Is TLS required?
     *
     * @var boolean
     */
    private bool $TLSRequired;

    /**
     * Should TLS be verified?
     *
     * @var boolean
     */
    private bool $TLSVerify;

    /**
     * Is SSL required?
     *
     * @var boolean
     */
    private bool $SSLRequired;

    /**
     * Max payload size
     *
     * @var integer
     */
    private int $maxPayload;

    /**
     * Connection URL list
     *
     * @var array
     */
    private array $connectURLs;


    /**
     * ServerInfo constructor.
     *
     * @param string $connectionResponse Connection response Message.
     */
    public function __construct(string $connectionResponse)
    {
        $parts = explode(' ', $connectionResponse);
        $data  = json_decode($parts[1], true);

        $this->setServerID($data['server_id']);
        $this->setHost($data['host']);
        $this->setPort($data['port']);
        $this->setVersion($data['version']);
        $this->setGoVersion($data['go']);
        $this->setAuthRequired(isset($data['auth_required']) ? $data['auth_required'] : false);
        $this->setTLSRequired(isset($data['tls_required']) ? $data['tls_required'] : false);
        $this->setTLSVerify(isset($data['tls_verify']) ? $data['tls_verify'] : false);
        $this->setMaxPayload($data['max_payload']);

        if (version_compare($data['version'], '1.1.0') === -1) {
            $this->setSSLRequired($data['ssl_required']);
        }
    }

    /**
     * Get the server ID.
     *
     * @return string Server ID.
     */
    public function getServerID(): string
    {
        return $this->serverID;
    }

    /**
     * Set the server ID
     *
     * @param string $serverID Server ID.
     *
     * @return void
     */
    public function setServerID(string $serverID)
    {
        $this->serverID = $serverID;
    }

    /**
     * Get the server host name or ip.
     *
     * @return string Server host.
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * Set the server host name or ip.
     *
     * @param string $host Server host.
     *
     * @return void
     */
    public function setHost(string $host)
    {
        $this->host = $host;
    }

    /**
     * Get server port number.
     *
     * @return integer Server port number.
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * Set server port number.
     *
     * @param integer $port Server port number.
     *
     * @return void
     */
    public function setPort(int $port)
    {
        $this->port = $port;
    }

    /**
     * Get server version number.
     *
     * @return string Server version number.
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * Set server version number.
     *
     * @param string $version Server version number.
     *
     * @return void
     */
    public function setVersion(string $version)
    {
        $this->version = $version;
    }

    /**
     * Get the golang version number.
     *
     * @return string Go version number.
     */
    public function getGoVersion(): string
    {
        return $this->goVersion;
    }

    /**
     * Set the golang version number.
     *
     * @param string $goVersion Go version number.
     *
     * @return void
     */
    public function setGoVersion(string $goVersion)
    {
        $this->goVersion = $goVersion;
    }

    /**
     * Check if server requires authorization.
     *
     * @return boolean If auth is required.
     */
    public function isAuthRequired(): bool
    {
        return $this->authRequired;
    }

    /**
     * Set if the server requires authorization.
     *
     * @param boolean $authRequired If auth is required.
     *
     * @return void
     */
    public function setAuthRequired(bool $authRequired)
    {
        $this->authRequired = $authRequired;
    }

    /**
     * Check if server requires TLS.
     *
     * @return boolean If TLS is required.
     */
    public function isTLSRequired(): bool
    {
        return $this->TLSRequired;
    }

    /**
     * Set if server requires TLS.
     *
     * @param boolean $TLSRequired If TLS is required.
     *
     * @return void
     */
    public function setTLSRequired(bool $TLSRequired)
    {
        $this->TLSRequired = $TLSRequired;
    }

    /**
     * Check if TLS certificate is verified.
     *
     * @return boolean If TLS certificate is verified.
     */
    public function isTLSVerify(): bool
    {
        return $this->TLSVerify;
    }

    /**
     * Set if server verifies TLS certificate.
     *
     * @param boolean $TLSVerify If TLS certificate is verified.
     *
     * @return void
     */
    public function setTLSVerify(bool $TLSVerify)
    {
        $this->TLSVerify = $TLSVerify;
    }

    /**
     * Check if SSL is required.
     *
     * @return boolean If SSL is required.
     */
    public function isSSLRequired(): bool
    {
        return $this->SSLRequired;
    }

    /**
     * Set if SSL is required.
     *
     * @param boolean $SSLRequired If SSL is required.
     *
     * @return void
     */
    public function setSSLRequired(bool $SSLRequired)
    {
        $this->SSLRequired = $SSLRequired;
    }

    /**
     * Get the max size of the payload.
     *
     * @return integer Size in bytes.
     */
    public function getMaxPayload(): int
    {
        return $this->maxPayload;
    }

    /**
     * Set the max size of the payload.
     *
     * @param integer $maxPayload Size in bytes.
     *
     * @return void
     */
    public function setMaxPayload(int $maxPayload)
    {
        $this->maxPayload = $maxPayload;
    }

    /**
     * Get the server connection URLs.
     *
     * @return array List of server connection urls.
     */
    public function getConnectURLs(): array
    {
        return $this->connectURLs;
    }

    /**
     * Set the server connection URLs.
     *
     * @param array $connectURLs List of server connection urls.
     *
     * @return void
     */
    public function setConnectURLs(array $connectURLs)
    {
        $this->connectURLs = $connectURLs;
    }
}
