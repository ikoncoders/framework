<?php 
namespace Caremi;

use Caremi\Http\Route;
use Caremi\Database\DB;
use Caremi\Http\Request;
use Caremi\Http\Response;
use Caremi\Support\Config;
use Caremi\Support\Session;
use Caremi\Database\Managers\MySQLManager;
use Caremi\Database\Managers\SQLiteManager;

class Application
{
    protected Route $route;
    protected Request $request;
    protected Response $response;
    protected DB $db;
    protected Config $config;
    protected Session $session;

    public function __construct()
    {
        $this->request = new Request;
        $this->response = new Response;
        $this->route = new Route($this->request, $this->response);
        $this->db = new DB($this->getDatabaseDriver());
        $this->config = new Config($this->loadConfigurations());
        $this->session = new Session;
    }

    protected function getDatabaseDriver()
    {
         return match(env('DB_DRIVER')) {
            'sqlite' => new SQLiteManager,
            'mysql' => new MySQLManager,
            default => new SQLiteManager
        };
    }

    protected function loadConfigurations()
    {
        foreach(scandir(config_path()) as $file) {
            if ($file == '.' || $file == '..') {
                continue;
            }
            $filename = explode('.', $file)[0];

            yield $filename => require config_path() . $file;
        }

    }

    public function run()
    {
        $this->db->init();

        $this->route->resolve();
    }

    public function __get($name)
    {
        if(property_exists($this, $name)) {
            return $this->$name;
        }
    }
}
