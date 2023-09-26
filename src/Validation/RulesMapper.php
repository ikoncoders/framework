<?php declare(strict_types=1);
namespace Caremi\Validation;

use Caremi\Validation\Rules\EmailRule;
use Caremi\Validation\Rules\UniqueRule;
use Caremi\Validation\Rules\BetweenRule;
use Caremi\Validation\Rules\AlphaNumRule;
use Caremi\Validation\Rules\RequiredRule;
use Caremi\Validation\Rules\ConfirmedRule;

trait RulesMapper
{
    protected static array $map = [
        'required' => RequiredRule::class,
        'alnum' => AlphaNumRule::class,
        //'max' => MaxRule::class,
        'between' => BetweenRule::class,
        'email' => EmailRule::class,
        'confirmed' => ConfirmedRule::class,
        'unique' => UniqueRule::class,
    ];

    public static function resolve(string $rule, $options)
    {
        return new static::$map[$rule](...$options);
    }
}
