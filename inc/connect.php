<?php 
    class DbConnection
        {
            private static $instance;
            private $connection;

            private function __construct()
                {
                    // DO NOTHING HERE, WE DO NOT WANT THE CONSUMER TO INSTANTIATE THIS TYPE!
                }

            private static function getInstance()
                {
                    if (self::$instance == null)
                        {
                            $dbConnectionType = __CLASS__;
                            self::$instance = new $dbConnectionType();
                        }

                    return self::$instance;
                }

            private static function initializeConnection()
                {
                    $db = self::getInstance();
                    $configIni = parse_ini_file(__DIR__.'/../private/config.ini');
                    $db->connection = new mysqli($configIni['servername'], $configIni['username'], $configIni['password'], $configIni['dbname']);

                    return $db;
                }

            public static function getConnection()
                {
                    try
                        {
                            $db = self::initializeConnection();
                            return $db->connection;
                        }
                        catch (Exception $ex) 
                        {
                            echo "Unable to connect to the database: ".$ex->getMessage();
                            return null;
                        }
                }
        }
        
    class ApiConnection
        {
            private static $instance;
            private $connection;

            private function __construct()
                {
                    // DO NOTHING HERE, WE DO NOT WANT THE CONSUMER TO INSTANTIATE THIS TYPE!
                }

            private static function getInstance()
                {
                    if (self::$instance == null)
                        {
                            $apiConnectionType = __CLASS__;
                            self::$instance = new $apiConnectionType();
                        }

                    return self::$instance;
                }

            private static function initializeConnection()
                {
                    $api = self::getInstance();
                    $configIni = parse_ini_file(__DIR__.'/../private/config.ini');
                    
                    $client = new Google_Client();
                    $client->setApplicationName("UTTE");
                    $client->setDeveloperKey($configIni['apikey']);
                    
                    $api->connection = new Google_Service_Books($client);

                    return $api;
                }

            public static function getConnection()
                {
                    try
                        {
                            $api = self::initializeConnection();
                            return $api->connection;
                        }
                        catch (Exception $ex) 
                        {
                            echo "Unable to instantiate Google_Service_Books object: ".$ex->getMessage();
                            return null;
                        }
                }
        }
?>