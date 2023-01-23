<?php 

error_reporting(E_ALL);
session_start();

include 'master.php';
include 'config.inc.php';    
include 'database.inc.php';

$emailAddress = $_REQUEST['EMAILADDRESS'];
$password = $_REQUEST['PASSWORD'];

//Declare a field to search in the database.
$myField = "email";

$sql = sprintf("SELECT email, password FROM tbluser WHERE email='%s' AND password='%s'", mysql_real_escape_string($emailAddress), mysql_real_escape_string($password));

$databaseObject = new clsDatabase();

$databaseObject->setCon($con);

$databaseObject->setSQL($sql);

$databaseObject->DML_QUERY_FIELD_SINGLE($myField);

$userName = sprintf($databaseObject->getSingleReturn());
echo($userName);

    if ($userName <> ""){
        
        $_SESSION['USERNAME'] = $userName;
        
        //setcookie("USERNAME", $userName, time() + 3600);
        
        //echo $userName;
        header('Location: http://localhost/cst499/profile.php');
        
}

    else{
        header('Location: http://localhost/cst499/login.php');
    }

?>

