<?php
/**
 * Created by PhpStorm.
 * User: Jordan Smith
 * Date: 2/13/2019
 * Time: 9:56 AM
 */

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'vendor/autoload.php';
session_start();

//Connect to DB
require 'model/dbfunctions.php';
$dbh = connect();
if(!$dbh) //don't go any further if we can't connect to the database
{
    exit;
}

//Create an instance of the Base class
$f3 = Base::instance();

//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//Define a default route
$f3->route('GET /', function ($f3)
{
    $students = getStudents();
    $f3->set('students', $students);

    echo Template::instance()->render("views/all-students.html");
});

$f3->route('GET /add', function ($f3)
{
    echo Template::instance()->render("views/add.html");
});

//Run fat free
$f3->run();
