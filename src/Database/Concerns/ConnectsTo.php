<?php  declare(strict_types=1);
namespace Caremi\Database\Concerns;

use Caremi\Database\Managers\Contracts\DatabaseManager;

trait ConnectsTo
{
    public static function connect(DatabaseManager $manager)
    {
        return $manager->connect();
    }
}
