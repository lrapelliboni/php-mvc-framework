<?php
namespace System\Core;

use \System\Core\Utils\ConfigLoader;

abstract class Database
{
    /**
     * @var string
     */
    private $hostname;
    /**
     * @var string
     */
    private $username;
    /**
     * @var string
     */
    private $password;
    /**
     * @var string
     */
    private $database;
    /**
     * @var string
     */
    private $adapter;

    /**
     * @param string $adapter
     */
    public function __construct($adapter)
    {
        $configLoaderInstance  = (ConfigLoader::getInstance());
        $this->hostname = $configLoaderInstance->getValue('database.hostname');
        $this->username = $configLoaderInstance->getValue('database.username');
        $this->password = $configLoaderInstance->getValue('database.password');
        $this->database = $configLoaderInstance->getValue('database.database');
        $this->adapter = $adapter;
    }

    /**
     * @return string
     */
    private function getConnectionString()
    {
        return sprintf('%s:host=%s;dbname=%s', $this->adapter, $this->hostname, $this->database);
    }

    /**
     * @return \PDO
     */
    protected function getConnection()
    {
        try {
            return new \PDO(
                $this->getConnectionString(),
                $this->username,
                $this->password
            );
        } catch (PDOException $e) {
            printf('Erro de conexão: %s', $e->getMessage());
        }
    }

    /**
     * @return \PDO
     */
    public function connect()
    {
        return $this->getConnection();
    }
}
