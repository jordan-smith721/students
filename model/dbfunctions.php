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

function getStudents()
{
    global $dbh;

    $sql = "SELECT * FROM student ORDER BY last, first";
    $statement = $dbh->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}