<?php 

session_start();
error_reporting(E_ALL);

include_once 'config.inc.php';    
include_once 'database.inc.php';

$databaseObject = new clsDatabase();
$databaseObject->setCon($con);

selectUserID($databaseObject);
selectClassID($databaseObject);
deleteIDs($databaseObject);



reviewClass();


    function selectUserID(&$pDatabaseObject){
        
        $userName = $_SESSION['USERNAME'];
        $myField = "userID";
    
        $sql = sprintf("SELECT userID FROM tbluser WHERE email='%s'", mysql_real_escape_string($userName));
        
        $pDatabaseObject->setSQL($sql);

        $pDatabaseObject->DML_QUERY_FIELD_SINGLE($myField);

        $myQuery = sprintf($pDatabaseObject->getSingleReturn());

        $myVar = $myQuery;
        
        $_SESSION['USERID'] = $myVar;
        
        //setcookie("USERID", $myVar, time() + 3600);
    
    }

    function selectClassID(&$pDatabaseObject){
        
        $className = $_REQUEST['REMOVE_CLASS'];
        $semester = $_REQUEST['SEMESTER_DELETE'];
        
        $myField = "classID";
        
        $sql = sprintf("SELECT classID FROM tblclass WHERE className='%s' AND semester='%s'", mysql_real_escape_string($className), mysql_real_escape_string($semester));
        
        $pDatabaseObject->setSQL($sql);

        $pDatabaseObject->DML_QUERY_FIELD_SINGLE($myField);

        $myQuery = sprintf($pDatabaseObject->getSingleReturn());
        
        $myVar = $myQuery;
        
        $_SESSION['CLASSID'] = $myVar;

        //setcookie("CLASSID", $myVar, time() + 3600);

    }

    function deleteIDs(&$pDatabaseObject){
        

        $myUserID = $_SESSION['USERID'];
        $myClassID = $_SESSION['CLASSID'];
        
        $sql = sprintf("DELETE FROM tblregistration WHERE userID='%s' AND classID='%s'", mysql_real_escape_string($myUserID), mysql_real_escape_string($myClassID));

        $pDatabaseObject->setSQL($sql);    

        $pDatabaseObject->DML_STATEMENT(); 
    }
        
    function reviewClass(){
        
        header("Location: http://localhost/cst499/profile.php");

    }

?>
