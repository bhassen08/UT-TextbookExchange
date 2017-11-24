<?php
    function connect()
    {
        // Defining database connection as static so we do not connect more than once.
        static $db;

        if (!isset($db))
        {
            // Make sure to have the config.ini file filled out in your UTTE root/private folder.
            $config = parse_ini_file('../private/config.ini');
            $db = mysqli_connect($config['servername'], $config['username'], $config['password'], $config['dbname']);
        }

        if ($db == false)
        {
            return mysqli_connect_error();
        }

        return $db;
    }

    // Database connection
    $db = connect();

    if ($db->connect_error)
    {
        die("Connection failed: " .$db->connect_error);
    }
?>