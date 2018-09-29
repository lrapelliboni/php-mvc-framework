<?php
namespace App\Utils;
use \System\Core\Database;

class MySQLConnect extends Database {
    const ADAPTER = 'mysql';
    
    public function __construct()
    {
        parent::__construct(self::ADAPTER);
    }

    public function connect()
    {
        $pdo = $this->getConnection();
        $pdo->query("SET NAMES 'utf8'");
        return $pdo;
    }
}