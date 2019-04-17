<?php

/**
 * Index page for the food file.
 * User: Ryan Guelzo
 * Date: 04/15/19
 */
//Creates the session
sesion_start();


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
    echo $view->render('views/home.html');//uses views render method that returns the content of the page.
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

$f3->route('GET /breakfast/continental', function(){

    $view = new Template();
    echo $view->render("views/bfast-continental.html");
});

$f3->route('GET /breakfast/continental', function(){

    $view = new Template();
    echo $view->render("views/bfast-continental.html");
});

$f3->route('GET /order', function(){

    //Display form 1.
    $view = new Template();
    echo $view->render("views/form1.html");
});

$f3->route('POST /order2', function(){

    //looks at the array made by POST.
    //print_r($_POST);

    $_SESSION['food'] = $_POST['food'];

    //display form 2
    $view = new Template();
    echo $view->render("views/form2.html");
});

$f3->route('POST /summary', function(){

    //looks at the array made by POST.
    //print_r($_POST);

    $_SESSION['meal'] = $_POST['meal'];

    //display form 2
    $view = new Template();
    echo $view->render("views/summary.html");
});

$f3->route('GET /@item', function($f3, $params){

    $item = $params['item'];
    $foodsWeServe = array('spaghetti', 'enchiladas', 'pad thai', 'lumpia');

    if(!in_array($item, $foodsWeServe)){
        echo "We do not server $item";
    }

    switch($item){
        case 'spaghetti':
            echo "<h3>I like $item with meatballs</h3>";
            break;
        case 'pizza':
            echo "Pepperoni or veggie?";
            break;
        case 'tacos':
            echo "we do not server $item";
            break;
        case 'bagel':
            $f3->reroute("/breakfast/continental");
        default:
            $f3->error(404);
    }
});

//Run fat-free
$f3->run();