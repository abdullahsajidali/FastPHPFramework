<?php

$router = new AltoRouter();

//example
//$router->map( 'GET', '/customer/[i:id]/', 'CustomerController#getData' );


$match = $router->match();

if ($match) {

    
    //check if its a static file
    if (is_file("app/template/".$match['target']))
    {
        include_once("app/template/".$match['target']);
    }


    if (strpos($match['target'], "#")) {
        list($object, $method) = explode("#", $match['target']);
        $view = new $object;
        $view->$method($match['params']);
    }

} else {
    header("HTTP/1.0 404.php Not Found");
    $error = new BaseController();
    $error->assign("title", "404");
    $error->render("404.php");
}
