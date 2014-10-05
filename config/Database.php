<?php

namespace FreightDataGenerator\Config;

class Database 
{
    protected static $instance;
    protected $connection;
    protected $server;
    protected $username;
    protected $password;
    protected $dbname;

    protected  function __construct(){}

    public static function getInstance()
    {
        if(!self::$instance instanceof Database){
            self::$instance = new Database();
        }

        return self::$instance;
    }

    /**
     * @param mixed $dbname
     */
    public function setDbname($dbname)
    {
        $this->dbname = $dbname;
    }

    /**
     * @return mixed
     */
    public function getDbname()
    {
        return $this->dbname;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $server
     */
    public function setServer($server)
    {
        $this->server = $server;
    }

    /**
     * @return mixed
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    public function getConnection()
    {
        if(empty($this->connection)){
            $this->connection = mysql_connect($this->server, $this->username, $this->password);
            mysql_select_db($this->dbname, $this->connection);
        }

        return $this->connection;
    }
}