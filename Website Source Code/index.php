<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>

    <?php setup(); ?>

    <div class="container text-center">
        <h1>Welcome to the University of Arizona's Global Campus Online Class Registration Page!</h1>
    </div>

    <div class="container text-center">
        <img class="img-responsive" src="Library.JPG" />
    </div>

    <?php include_once 'footer.php'; ?>

</body>

</html>

<?php

    function setup(){
        
        error_reporting(E_ALL); 
        session_start();
    
        //Set site permissions and session cookie if none exist.    
        if (empty($_SESSION['PERMISSIONS']) && empty($_SESSION['USERNAME'])) {
        
            
            include 'login.inc.php';
    
            $privelageObject = new clsUserPermissions();
            $privelageObject->setPermission("NONE");

        }    

        //Acknowledge the user if logged in.
        if (isset($_SESSION['USERNAME'])) {
            
            echo ("Hello: " . $_SESSION['USERNAME'] . "\n");
        }

        //Alert the user of their site permission level.
        if (isset($_SESSION['PERMISSIONS']) && ['PERMISSIONS'] <> "GUEST"){
            
            echo ("You are browsing as a: " . $_SESSION['PERMISSIONS']);

        } elseif (isset($_SESSION['PERMISSIONS']) && $_SESSION['PERMISSIONS'] == "GUEST") {
    
            echo ("You have not logged in. You are browsing as a: " . $_SESSION['PERMISSIONS']);
        }
    
            include 'master.php';
        
    }

?>
