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
                $db->connection = new mysqli('localhost', 'xbucketo_tt', 'blaff22laff13', 'xbucketo_tt');
                
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
?>