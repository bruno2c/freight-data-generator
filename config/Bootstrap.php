<?php

namespace FreightDataGenerator\Config;

class Bootstrap 
{
    private static $instance;
    private $config;
    private $baseUrl;

    private function __construct()
    {
        $this->config = parse_ini_file('application.ini', true);
    }

    public static function getInstance()
    {
        if(!self::$instance instanceof Bootstrap){
            self::$instance = new Bootstrap();
        }

        return self::$instance;
    }

    public function getBaseUrl()
    {
        if(empty($this->baseUrl)){
            $level = $this->config['application']['url.base.level'];
            $requestUri = explode('/', $_SERVER['REQUEST_URI']);

            for($i = 0; $i < $level; $i++){
                $this->baseUrl .= $requestUri[$i];

                if($i < count($requestUri)){
                    $this->baseUrl .= '/';
                }
            }
        }

        return $this->baseUrl;
    }

    public function run()
    {
        $this->connectDb();
    }

    public function resolveUrl()
    {
        $requestUri = str_replace($this->getBaseUrl(), '', $_SERVER['REQUEST_URI']);
        $path = explode('/', $requestUri);
        $requestFile = ucfirst($path[count($path)-1]) . ".php";
        $requestClass = APPLICATION_NAMESPACE;

        if ($path) {
            foreach ($path as $key => $file) {
                $requestClass .= ucfirst($file);

                if($key < count($requestUri)){
                    $requestClass .= '\\';
                }
            }

            if(file_exists(SCRIPT_PATH . $requestFile)){
                return new $requestClass();
            }
        }
    }

    protected function connectDb()
    {
        $database = Database::getInstance();
        $database->setServer($this->config['application']['db.server']);
        $database->setUsername($this->config['application']['db.username']);
        $database->setPassword($this->config['application']['db.password']);
        $database->setDbname($this->config['application']['db.dbname']);
    }
}