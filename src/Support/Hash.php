<?php declare(strict_types=1);
namespace Caremi\Support;
class Hash
{
    public static function make($value)
    {
        return password_hash($value, PASSWORD_BCRYPT);
    }

    public static function hash($value)
    {
        return sha1($value);
    }

    public static function verify($value, $hashedValue)
    {
        return password_verify($value, $hashedValue);
    }
}
