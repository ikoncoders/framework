<?php declare(strict_types=1);
namespace Caremi\Validation;
class ErrorBag
{
    protected array $errors = [];

    public function add($field, $message)
    {
        $this->errors[$field][] = $message;
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }
}
