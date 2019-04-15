<?php

/**
 * Index page for another test project.
 * User: Ryan Guelzo
 * Date: 04/15/19
 */

//Error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the autoload
require_once('vendor/autoload.php');

//Creates the instance of the base class
$f3 = Base::instance();

//Specified the default route
$f3->route('GET /', function () {
    //Displays a view
    $view = new Template();
    echo $view->render("views/html");

});

//Run fat-free
$f3->run();