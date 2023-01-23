<?php
session_start();
	error_reporting(E_ALL);
    include 'master.php';

if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-2595000);
        setcookie($name, '', time()-2595000, '/');
    }
}

        header("Location: http://localhost/cst499/index.php");
 
?>