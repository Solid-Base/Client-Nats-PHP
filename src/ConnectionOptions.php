<?php

namespace SolidBase\Nats;

use Traversable;

class ConnectionOptions
{
    /**
     * Hostname or IP to connect.
     *
     */
    private string $host = 'localhost';

    /**
     * Port number to connect.
     *
     */
    private int $port = 4222;

    /**
     * Username to connect.
     *
     */
    private ?string $user = null;

    /**
     * Password to connect.
     *
     */
    private ?string $pass = null;

    /**
     * Token to connect.
     *
     */
    private ?string $token = null;

    /**
     * Language of this client.
     *
     */
    private string $lang = 'php';

    /**
     * Version of this client.
     *
     */
    private string $version = '0.8.2';

    /**
     * If verbose mode is enabled.
     *
     */
    private bool $verbose = false;

    /**
     * If pedantic mode is enabled.
     *
     */
    private bool $pedantic = false;

    /**
     * If reconnect mode is enabled.
     *
     */
    private bool $reconnect = true;

    /**
     * Stream context to use.
    * @var resource
     */
    private mixed $streamContext = null;

    /**
     * Allows to define parameters which can be set by passing them to the class constructor.
     *
     */
    private array $configurable = [
                             'host',
                             'port',
                             'user',
                             'pass',
                             'token',
                             'lang',
                             'version',
                             'verbose',
                             'pedantic',
                             'reconnect',
                             'streamContext',
                            ];


    /**
     * ConnectionOptions constructor.
     *
     * <code>
     * use Nats\ConnectionOptions;
     *
     * $options = new ConnectionOptions([
     *     'host' => '127.0.0.1',
     *     'port' => 4222,
     *     'user' => 'nats',
     *     'pass' => 'nats',
     *     'lang' => 'php',
     *      // ...
     * ]);
     * </code>
     *
     * @param Traversable|array $options The connection options.
     */
    public function __construct(Traversable|array|null $options = null)
    {
        //Default stream context
        $this->streamContext = stream_context_get_default();

        if (empty($options) === false) {
            $this->initialize($options);
        }
    }
    /**
    * Get the URI for a server.
    *
    */
    public function getAddress(): string
    {
        return 'tcp://' . $this->host . ':' . $this->port;
    }


    /**
     * Get the options JSON string.
     *
     * @return string
     */
    public function __toString()
    {
        $a = [
              'lang'     => $this->lang,
              'version'  => $this->version,
              'verbose'  => $this->verbose,
              'pedantic' => $this->pedantic,
             ];
        if (empty($this->user) === false) {
            $a['user'] = $this->user;
        }

        if (empty($this->pass) === false) {
            $a['pass'] = $this->pass;
        }

        if (empty($this->token) === false) {
            $a['auth_token'] = $this->token;
        }

        return json_encode($a);
    }


    /**
     * Get host.
     *
     */
    public function getHost(): string
    {
        return $this->host;
    }


    /**
     * Set host.
     *
     */
    public function setHost(string $host): self
    {
        $this->host = $host;

        return $this;
    }


    /**
     * Get port.
     *
     */
    public function getPort(): int
    {
        return $this->port;
    }


    /**
     * Set port.
     *
     * @param integer $port Port.
     *
     * @return $this
     */
    public function setPort(int $port): self
    {
        $this->port = $port;

        return $this;
    }


    /**
     * Get user.
     *
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }


    /**
     * Set user.
     *
     * @param string $user User.
     *
     * @return $this
     */
    public function setUser(string $user): self
    {
        $this->user = $user;

        return $this;
    }


    /**
     * Get password.
     *
     * @return string
     */
    public function getPass(): string
    {
        return $this->pass;
    }

    /**
     * Set password.
     *
     * @param string $pass Password.
     *
     * @return $this
     */
    public function setPass(string $pass): self
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get token.
     *
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * Set token.
     *
     * @param string $token Token.
     *
     * @return $this
     */
    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get language.
     *
     * @return string
     */
    public function getLang(): string
    {
        return $this->lang;
    }


    /**
     * Set language.
     *
     * @param string $lang Language.
     *
     * @return $this
     */
    public function setLang(string $lang): self
    {
        $this->lang = $lang;

        return $this;
    }


    /**
     * Get version.
     *
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }


    /**
     * Set version.
     *
     * @param string $version Version number.
     *
     * @return $this
     */
    public function setVersion(string $version): self
    {
        $this->version = $version;

        return $this;
    }


    /**
     * Get verbose.
     *
     * @return boolean
     */
    public function isVerbose(): bool
    {
        return $this->verbose;
    }


    /**
     * Set verbose.
     *
     * @param boolean $verbose Verbose flag.
     *
     * @return $this
     */
    public function setVerbose(bool $verbose): self
    {
        $this->verbose = $verbose;

        return $this;
    }


    /**
     * Get pedantic.
     *
     * @return boolean
     */
    public function isPedantic(): bool
    {
        return $this->pedantic;
    }


    /**
     * Set pedantic.
     *
     * @param boolean $pedantic Pedantic flag.
     *
     * @return $this
     */
    public function setPedantic(bool $pedantic): self
    {
        $this->pedantic = $pedantic;

        return $this;
    }


    /**
     * Get reconnect.
     *
     * @return boolean
     */
    public function isReconnect(): bool
    {
        return $this->reconnect;
    }


    /**
     * Set reconnect.
     *
     * @param boolean $reconnect Reconnect flag.
     *
     * @return $this
     */
    public function setReconnect(bool $reconnect): self
    {
        $this->reconnect = $reconnect;

        return $this;
    }

    /**
     * Get stream context.
     *
     * @return resource
     */
    public function getStreamContext(): mixed
    {
        return $this->streamContext;
    }

    /**
     * Set stream context.
     *
     * @param resource $streamContext Stream context.
     *
     * @return $this
     */
    public function setStreamContext(mixed $streamContext): self
    {
        $this->streamContext = $streamContext;

        return $this;
    }

    /**
    * Set the connection options.
    *
    * @param Traversable|array $options The connection options.
    *
    * @return void
    */
    public function setConnectionOptions(Traversable|array $options)
    {
        $this->initialize($options);
    }

    protected function initialize(Traversable|array $options)
    {
        if (is_array($options) === false && ($options instanceof Traversable) === false) {
            throw new NatsException('The $options argument must be either an array or Traversable');
        }

        foreach ($options as $key => $value) {
            if (in_array($key, $this->configurable, true) === false) {
                continue;
            }

            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method) === true) {
                $this->$method($value);
            }
        }
    }

}
