<?php

$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']).'Controller' : 'DefaultController';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';


$phpFile = preg_replace('/index.php/','',$_SERVER['PHP_SELF']);

$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'?'https':'http';

define('BASE_PATH', $protocol."://".$_SERVER['HTTP_HOST'].$phpFile);

/**
 * Require necessary base file
 */

require('Helper/view.php');

require "Controllers/$controllerName.php";


$controllerInstance = new $controllerName();

echo $controllerInstance->$action();

?>

