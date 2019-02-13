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

//Create an instance of the Base class
$f3 = Base::instance();

//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//Define a default route
$f3->route('GET /', function ()
{
    echo "<h1>Student Page</h1>";
});

//Run fat free
$f3->run();
