<?php
//load autoloading
header("Content-Type: text/html; charset=utf-8");
 

$lifetime=time()+60*60*24*365;
session_start();
setcookie(session_name(),session_id(),$lifetime, "/");

include_once("app/lib/AutoLoader.php");
include_once ("routing.php");
