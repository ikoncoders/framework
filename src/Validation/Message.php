<?php declare(strict_types=1);
namespace Caremi\Validation;
class Message
{
    public static function generate($rule, $field)
    {
        return str_replace('%s', $field, $rule);
    }
}
