<?php
    function Connect()
    {
        // Defining database connection as static so we do not connect more than once.
        static $db;

        if (!isset($db))
        {
            // Make sure to have the config.ini file filled out in your UTTE root/private folder.
//            $isThisReal = dirname($_SERVER['REQUEST_URI']);
//            $hey = realpath('../private/config.ini');
            $whatisthis = printr(realpath(__DIR__.'../private/config.ini'));
            $config = parse_ini_file(__DIR__.'../private/config.ini');
            $servername = $config['servername'];
            $username = $config['username'];
            $password = $config['password'];
            $dbname = $config['dbname'];
            $db = mysqli_connect($config['servername'], $config['username'], $config['password'], $config['dbname']);
        }

        if ($db == false)
        {
            echo mysqli_connect_error();
        }

        return $db;
    }

    // Database connection
    $db = Connect();

    if ($db->connect_error)
    {
        die("Connection failed: " .$db->connect_error);
    }
?>