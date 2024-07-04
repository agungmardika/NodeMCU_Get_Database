<?php
class Database
{
    private static $dbName = 'dbstatusled';
    private static $dbHost = 'localhost';
    private static $dbUsername = 'root';
    private static $dbUserPassword = '';
    private static $dbPort = 3307;

    private static $cont = null;

    public function __construct()
    {
        die('Init function is not allowed');
    }

    public static function connect()
    {
        // One connection through the whole application
        if (null == self::$cont) {
            try {
                $dsn = "mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName . ";port=" . self::$dbPort;
                self::$cont = new PDO($dsn, self::$dbUsername, self::$dbUserPassword);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }

    public static function disconnect()
    {
        self::$cont = null;
    }
}
