<?php 

session_start();
error_reporting(E_ALL);

include_once 'config.inc.php';    
include_once 'database.inc.php';

$databaseObject = new clsDatabase();
$databaseObject->setCon($con);

determineUserAccess();
//renewCookies();
selectUserID($databaseObject);
selectClassID($databaseObject);
insertIDs($databaseObject);

//unset($databaseObject);

reviewClass($databaseObject);

    
    function determineUserAccess(){
        
        if ($_SESSION['PERMISSIONS'] == "GUEST"){

            header("Location: http://localhost/cst499/login.php");
            exit;

        }
        
        else{
            
            $myVar = $_REQUEST['ADD_CLASS'];
            $_SESSION['CLASS_SELECTION'] = $myVar;
            //setcookie("CLASS_SELECTION", $myVar, time() + 3600);
            
        }
        
    }

    //function renewCookies(){
        
            //setcookie('USERID', '', time()-2595000);
            //setcookie('USERID', '', time()-2595000, '/');
            
            //setcookie('CLASSID', '', time()-2595000);
            //setcookie('CLASSID', '', time()-2595000, '/');
 
    //}

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
        
        $className = $_SESSION['CLASS_SELECTION'];
        $semester = $_SESSION['SEMESTER_SELECTION'];
        
        $myField = "classID";
        
        $sql = sprintf("SELECT classID FROM tblclass WHERE className='%s' AND semester='%s'", mysql_real_escape_string($className), mysql_real_escape_string($semester));
        
        $pDatabaseObject->setSQL($sql);

        $pDatabaseObject->DML_QUERY_FIELD_SINGLE($myField);

        $myQuery = sprintf($pDatabaseObject->getSingleReturn());
        
        $myVar = $myQuery;
        
        $_SESSION['CLASSID'] = $myVar;

        //setcookie("CLASSID", $myVar, time() + 3600);

    }

    function insertIDs(&$pDatabaseObject){
        

        $myUserID = $_SESSION['USERID'];
        $myClassID = $_SESSION['CLASSID'];
        
        $sql = sprintf("INSERT INTO tblregistration(userID, classID) VALUES($myUserID,$myClassID)");

        $pDatabaseObject->setSQL($sql);    

        $pDatabaseObject->DML_STATEMENT(); 
    }
        
    function reviewClass($databaseObject){
        
        header("Location: http://localhost/cst499/reviewClass.php");

    }

?>
