<?php

/**
 * Index page for the food file.
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
    $view = new Template();//Class in the Fat-Free Framework
    echo $view->render('views/html');//uses views render method that returns the content of the page.

});

//Define a breakfast route
$f3->route('GET /breakfast', function(){

    $view = new Template();
    echo $view->render('views/breakfast.html');
});

$f3->route('GET /lunch', function(){

    $view = new Template();
    echo $view->render("views/lunch.html");
});

//Run fat-free
$f3->run();