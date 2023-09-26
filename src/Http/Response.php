<?php declare(strict_types=1);
namespace Caremi\Http;
class Response
{
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }

    public function back()
    {
        header('Location:' . $_SERVER['HTTP_REFERER']);

        return $this;
    }
}