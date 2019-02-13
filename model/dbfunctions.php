<?php

//require our db config file
require_once('/home/jsmithgr/config.php');

function connect()
{
    try {
        //Instantiate a db object
        $dbh = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        return $dbh;
    }
    catch(PDOException $ex)
    {
        echo $ex->getMessage();
        return false;
    }
}