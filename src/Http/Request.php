<?php //framework\src\Http\Request.php
namespace Ikoncoders\Framework\Http;

class Request
{
    public function __construct(
        public readonly array $getParams,
        public readonly array $postParams,
        public readonly array $cookies,
        public readonly array $files,
        public readonly array $server
    )
    {
    }

    public static function createFromGlobals(): static
    {
        return new static($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);
    }

    /**
     * Summary of getPathInfo
     * @return bool|string
     */
    public function getPathInfo(): string
    {
        return strtok($this->server['REQUEST_URI'], '?');
    }
    /**
     * Summary of getMethod
     * @return bool|string
     */
    public function getMethod(): string
    {
        return $this->server['REQUEST_METHOD'];
    }
}