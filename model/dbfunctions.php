<?php

//require our db config file
require_once('/home/cleanogr/config.php');

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

function getAllStudents()
{
    global $dbh;

    $sql = "SELECT * FROM student ORDER BY last, first";
    $statement = $dbh->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function addStudent($sid, $last, $first, $birthdate, $gpa, $advisor)
{
    global $dbh;

    $sql = "INSERT INTO student VALUES(:sid, :last, :first, :birthdate, :gpa, :advisor)";
    $statement = $dbh->prepare($sql);

    //bind parameters
    $statement->bindParam(':sid', $sid, PDO::PARAM_STR);
    $statement->bindParam(':last', $last, PDO::PARAM_STR);
    $statement->bindParam(':first', $first, PDO::PARAM_STR);
    $statement->bindParam(':birthdate', $birthdate, PDO::PARAM_STR);
    $statement->bindParam(':gpa', $gpa, PDO::PARAM_STR);
    $statement->bindParam(':advisor', $advisor, PDO::PARAM_STR);

    //execute the statement and return true or false if it was successful
    return $statement->execute();

}

function getStudent($sid) {
    global $dbh;

    $sql = "SELECT sid FROM student WHERE sid = '$sid'";
    $statement = $dbh->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;

}