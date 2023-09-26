<?php  declare(strict_types=1);
namespace Caremi\Validation\Rules\Contract;

interface Rule extends \Stringable
{
    public function apply($field, $value, $data = []);
}
